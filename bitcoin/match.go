package main

import (
	"fmt"
	sll "github.com/emirpasic/gods/lists/singlylinkedlist"
	"github.com/emirpasic/gods/trees/btree"
	//"github.com/emirpasic/gods/utils"
	"flag"
	"math/rand"
	"net"
	"os"
	"sync"
	"time"
)

var (
	ask_tree     *btree.Tree
	bid_tree     *btree.Tree
	new_ask_tree *btree.Tree
	new_bid_tree *btree.Tree
	deal_price   int //上次成交价
	ask_price    int //
	bid_price    int //

	address     string
	h           bool //help
	t           bool //test
	millisecond uint //
	m           *sync.Mutex
)

type Order struct {
	uid    int
	amount int
	price  int
	is_buy bool //true 买; false 卖
}

func match_deal() {
	go func() {
		//撮合

		m.Lock() //数据切换 加锁
		new_ask_tree_deal := new_ask_tree
		new_bid_tree_deal := new_bid_tree
		new_ask_tree = btree.NewWithIntComparator(3)
		new_bid_tree = btree.NewWithIntComparator(3)
		m.Unlock() //解锁

		fmt.Println(ask_tree.Size())
		fmt.Println(bid_tree.Size())
		fmt.Println(new_ask_tree_deal)
		fmt.Println(new_bid_tree_deal)

		for {
			//整理
			var new_ask_tree_price, ask_tree_price, new_bid_tree_price, bid_tree_price int
			var new_ask_tree_deal_right_value, ask_tree_right_value, new_bid_tree_deal_left_value, bid_tree_left_value *sll.List

			tree_note := new_ask_tree_deal.Right()
			if tree_note != nil {
				node_tmp, ok := (tree_note.Entries[len(tree_note.Entries)-1].Value.(*sll.List))
				if ok && node_tmp.Empty() {
					new_ask_tree_deal.Remove(tree_note.Entries[len(tree_note.Entries)-1].Key)
					continue
				}
				new_ask_tree_price, _ = (tree_note.Entries[len(tree_note.Entries)-1].Key.(int))
				new_ask_tree_deal_right_value = node_tmp
			}

			tree_note = ask_tree.Right()
			if tree_note != nil {
				node_tmp, ok := (tree_note.Entries[len(tree_note.Entries)-1].Value.(*sll.List))
				if ok && node_tmp.Empty() {
					ask_tree.Remove(tree_note.Entries[len(tree_note.Entries)-1].Key)
					continue
				}
				ask_tree_price, _ = (tree_note.Entries[len(tree_note.Entries)-1].Key.(int))
				ask_tree_right_value = node_tmp
			}

			tree_note = new_bid_tree_deal.Right()
			if tree_note != nil {
				node_tmp, ok := (tree_note.Entries[0].Value.(*sll.List))
				if ok && node_tmp.Empty() {
					new_bid_tree_deal.Remove(tree_note.Entries[0].Key)
					continue
				}
				new_bid_tree_price, _ = (tree_note.Entries[0].Key.(int))
				new_bid_tree_deal_left_value = node_tmp
			}

			tree_note = bid_tree.Right()
			if tree_note != nil {
				node_tmp, ok := (tree_note.Entries[0].Value.(*sll.List))
				if ok && node_tmp.Empty() {
					bid_tree.Remove(tree_note.Entries[0].Key)
					continue
				}
				bid_tree_price, _ = (tree_note.Entries[0].Key.(int))
				bid_tree_left_value = node_tmp
			}

			ask_price, ask_aim := max(new_ask_tree_price, ask_tree_price)
			bid_price, bid_aim := min(new_bid_tree_price, bid_tree_price)

			if ask_price <= 0 || bid_price <= 0 {
				break
			}

			if ask_price >= bid_price {

				var ask_node_list, bid_node_list *sll.List

				//取得成交的买/卖树
				if ask_aim == 0 {
					ask_node_list = new_ask_tree_deal_right_value
				} else {
					ask_node_list = ask_tree_right_value
				}

				if bid_aim == 0 {
					bid_node_list = new_bid_tree_deal_left_value
				} else {
					bid_node_list = bid_tree_left_value
				}

				//取中间值，成交价格
				if bid_price >= deal_price {
					deal_price = bid_price
				} else if ask_price < deal_price {
					deal_price = ask_price
				}

				for {
					ask_obj_inter, is_ask_obj := ask_node_list.Get(0)
					bid_obj_inter, is_bid_obj := bid_node_list.Get(0)
					if !is_ask_obj || !is_bid_obj {
						break
					}
					ask_obj, _ := (ask_obj_inter.(Order))
					bid_obj, _ := (bid_obj_inter.(Order))

					//从交易队列里去除完成的订单，并记录（后期做）
					if ask_obj.amount <= 0 {
						ask_node_list.Remove(0)
						continue
					}
					if bid_obj.amount <= 0 {
						bid_node_list.Remove(0)
						continue
					}

					deal_amount, _ := min(ask_obj.amount, bid_obj.amount)
					ask_obj.amount -= deal_amount
					bid_obj.amount -= deal_amount
				}

			} else {
				break
			}
		}

		it_tree := new_ask_tree_deal.Iterator()
		for it_tree.Next() {
			value_tree_node, _ := (it_tree.Value().(*sll.List))
			it_list := value_tree_node.Iterator()
			for it_list.Next() {
				value_list_node, _ := (it_list.Value().(Order))
				input_tree(value_list_node.uid, value_list_node.price, value_list_node.amount, value_list_node.is_buy, ask_tree)
			}
		}

		it_tree = new_bid_tree_deal.Iterator()
		for it_tree.Next() {
			value_tree_node, _ := (it_tree.Value().(*sll.List))
			it_list := value_tree_node.Iterator()
			for it_list.Next() {
				value_list_node, _ := (it_list.Value().(Order))
				input_tree(value_list_node.uid, value_list_node.price, value_list_node.amount, value_list_node.is_buy, bid_tree)
			}
		}
	}()
}

func timer() {
	timer := time.NewTicker(time.Millisecond << millisecond)
	for {
		select {
		case <-timer.C:
			match_deal()
		}
	}
}

func input_tree(uid, price, amount int, is_buy bool, new_tree *btree.Tree) {
	var node_tree_input *sll.List

	node, is_found := new_tree.Get(price)
	if !is_found {
		node_tree_input = sll.New()
	} else {
		node_tmp, ok := (node.(*sll.List))
		if !ok {
			node_tree_input = sll.New()
		} else {
			node_tree_input = node_tmp
		}
	}
	node_tree_input.Add(Order{uid, amount, price, is_buy})
	new_tree.Put(price, node_tree_input)
}

func input() {

	//每毫秒模拟订单
	timer_in := time.NewTicker(time.Millisecond)
	for {
		select {
		case <-timer_in.C:
			uid := rand.Intn(1000000) + 1000000
			price_ask := rand.Intn(1000000)
			amount := rand.Intn(10000)
			input_tree(uid, price_ask, amount, true, new_ask_tree)
			input_tree(uid, price_ask+100000, amount, false, new_bid_tree)
		}
	}

}

func handle(conn net.Conn) {
	// close connection before exit
	defer conn.Close()

	//客户端协议

	//订单提交（1个或多个订单）

}

func start_server(server string) {
	server_adress, err := net.ResolveTCPAddr("tcp", server)
	check_err(err)
	listen, err := net.ListenTCP("tcp", server_adress)
	check_err(err)

	defer listen.Close()
	fmt.Println("start server successful......")

	for {
		conn, err := listen.Accept()
		fmt.Println("accept tcp client %s", conn.RemoteAddr().String())
		check_err(err)
		// 每次建立一个连接就放到单独的协程内做处理
		go handle(conn)
	}

}

func init() {
	m = new(sync.Mutex)
	deal_price = 0
}

func init() {
	flag.StringVar(&address, "s", "127.0.0.1:3434", "server address ")
	flag.UintVar(&millisecond, "m", 7, " 2^m silliseconds cron ")
	flag.BoolVar(&h, "h", false, "this help")
	flag.BoolVar(&t, "t", false, "test input")
	flag.Usage = usage

	flag.Parse()
	if h {
		flag.Usage()
	}
}

func usage() {

	fmt.Fprintf(os.Stderr, `
match version: 0.0.1 
Usage: match [-ht] [-m millisecond] [-s address] 
        
Options:
`)

	flag.PrintDefaults()
	os.Exit(-1)

}

func main() {

	fmt.Println("address :", address)

	//导入数据，后期做

	ask_tree = btree.NewWithIntComparator(3)     //买入
	bid_tree = btree.NewWithIntComparator(3)     //卖出
	new_ask_tree = btree.NewWithIntComparator(3) //新买入
	new_bid_tree = btree.NewWithIntComparator(3) //新卖出

	go start_server(address)

	if t {
		go input()
	}

	timer()

}

//处理错误，根据实际情况选择此函数
func check_err(err error) {
	if err != nil {
		fmt.Println(err)
		os.Exit(-1)
	}
}

func min(x, y int) (int, int) {
	if x <= 0 && y > 0 {
		return y, 1
	}
	if y <= 0 && x > 0 {
		return x, 0
	}
	if y <= 0 && x <= 0 {
		return 0, 0
	}

	if x < y {
		return x, 0
	}
	return y, 1
}

func max(x, y int) (int, int) {
	if x <= 0 && y > 0 {
		return y, 1
	}
	if y <= 0 && x > 0 {
		return x, 0
	}
	if y <= 0 && x <= 0 {
		return 0, 0
	}

	if x > y {
		return x, 0
	}
	return y, 1
}
