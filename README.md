### 随手记 
##### 傻大猫

---

20171219
- 99%的公司老板都不懂；如何打造高效IT技术团队
	- 对象：大量运营应用级产品的公司（想要把技术团队效率翻倍甚至提高一个数量级么？）
	- 目标：提高开发效率；在产品持续变化中保持开发效率
	- 方式方法：
		
		> 挑选有专业工作精神的员工，帮助年轻员工做职业规划。

		> 产品策划/研发/测试/发布等各流程中使用和制造自动化工具，使用更高效的方法
		
		> 研发/运维/技术测试/等岗位合一（降低沟通成本，降低人力成本）

		- 统一编码规范；不断重构代码，保持系统整体越来越整洁（降低沟通成本，读代码是团队内最大的沟通）
		- 保持安静的工作环境，并保证技术岗员工有大块的时间（讨论问题一定要去会议室；大声说话会严重影响其他开发岗员工的学习和工作）
		- 不要加班。学习也是工作的一部分，让员工用时间学习提高个人能力，才能更好的实施上面的各条（学习内容如下）
		- 学习现代计算机软件运行的基础，必须要懂；我们的软件就跑在这些基础设施上面，神神秘秘懵懵懂懂我们就没走入软件的大门，遇到问题难以解决（计算机体系结构/操作系统/数据库理论/网络原理/数据结构/算法/等）
		- 学习软件开发的基本理论（数据抽象/分层结构/复用/降低复杂度/编程范式（面向对象/函数式编程）/编程语言的表达能力）

	- 以上是个简介，后面展开说明	

	- 挑选有专业工作精神的员工，帮助年轻员工做职业规划。
		```
		- 例如0：到下班时间了，发布一个产品客户端版本：甲，发布完就回家了；乙，验证了用户真正能顺利使用再回家。
		- 例如1：开发一个功能：甲，开发完了等待测试组的结果；乙，自己运行产品，看看哪些明显的功能bug或者快速设计的不完善地方，主动改进或者提出修改建议。
		```

	- 产品策划/研发/测试/发布等各流程中使用和制造自动化工具，使用更高效的方法
		```	
		- 统一的简单好用的项目管理和bug跟踪工具。
		- 自动生成数据代码；公用的功能做成可复用部分；高效的自动化的单元测试/接口测试；发布流程（稳定性与效率）
		- 要优化流程，永远不要跳过流程
		- 关注修改功能时的代码影响范围
		- 发布时间：时间确保发布以后开发人员持续在线，因为在发布之后出问题的影响面积更大。（下班前和周五发布是不应该的）
		- 新功能/新技术的引入到生产环境要慎重，确保稳定性
		```

	- 统一编码规范；不断重构代码，保持系统整体越来越整洁（降低沟通成本，读代码是团队内最大的沟通）
		```	
		- 这一条没啥可说的
		```

	- 保持安静的工作环境，并保证技术岗员工有大块的时间（讨论问题一定要去会议室；大声说话会严重影响其他开发岗员工的学习和工作）
		```	
		- 也没啥可说的，关键是执行
		```

	- 不要加班。学习也是工作的一部分，让员工用时间学习提高个人能力，才能更好的实施上面的各条（学习内容如下）
		```	
		- 关键也是执行
		```

	- 学习现代计算机软件运行的基础；（计算机体系结构/操作系统/数据库理论/网络原理/数据结构/算法/等）
		```	
		- 如果要在编程这行工作很久，必须要学；我们的软件就跑在这些基础设施上面，神神秘秘懵懵懂懂我们就没走入软件的大门，遇到问题难以解决
		- 计算机体系结构
			- 了解基本的冯诺依曼构架
			- 了解信息表示(二进制),香农-信息论
			- 了解程序执行和编译器如何工作
			- 存储层次（高速缓存到远程网络）
			- 等等
		- 操作系统
			- 了解内存管理
			- 了解文件管理
			- 详细了解进程/线程
		- 数据库理论
			- 了解数据库基础的理论和发展历史
			- 如果使用mysql数据库 《高性能mysql》
			- 了解数据的存储结构与查询原理
			- 评估应用表在目前和未来的数据量（数据量大小决定索引的使用）
			- 尽量把运算放在web端，而不是DB端（这是个大方向，具体也要灵活运用）
			- EXPLAIN语句来检验查询的执行情况
			- 选择性最大/频率最大/设计功能相关/覆盖索引/前缀索引/非等值运算转变成等值运算			
		- 网络原理（应用级软件开发设计的层面）
			- 简单了解网络协议分层结构
			- 详细了解socket
			- 了解http协议
			- 了解加密技术的原理和使用
		- 数据结构/算法/
			- 了解常用数据结构/复杂度分析
		```

	- 学习软件开发的基本理论
		```	
		- 过程抽象
			- 表达式
			- 复合过程
			- 条件分支
			- 过程封装（函数与作用域），过程可替代性；备注：作用域是一次大的进步
			- 迭代循环/递归和尾递归
			- 高阶函数（做为数据的函数，可做为参数和返回值）；备注：提供了更高的抽象层次
		- 数据抽象
			- 数据抽象指的是建立复合数据用以模拟复杂的现象；做为克服复杂性的一种技术方式；
			- 为什么需要复合数据？提升编程过程中的概念层次；提高模块性；增强语言表达能力；提高语言表达能力
			- 例如：有理数的本质是一个分数（分子/分母）；我们用有序整数对 [m, n] 表示一个有理数。 定义基本函数：function numerator() , 获取分子； function denominator() , 获取分母。我们通过这基本函数可以定义上层的一些函数：有理数的加/减/乘/除/相等。如果有理数的数据抽象变化了，我们只要修改那两个基本函数；而不用修改上层的函数。
			- 所以 这种使用抽象数据的分层的结构，实现了数据对象的构造与使用分离。
			- 数据的多重表示；例如复数：直接坐标表示；极坐标表示。如何分层构造？
			- 通用型操作：例如：兼容整数/有理数/实数/复数的算术运算
		- 过程和数据的组织方式
			- 面向对象
			- 函数式编程
		```
		
---

20171215
- （学习并分享）计算机程序的构造和解释

---

20171215
- 优秀程序员的标志 - 用于解决bug的时间在工作中的比例极低。
- 程序员的终极目标：
	- 实现功能
	- 提高效率（开发效率/运行效率）
	- 在长时间持续变动的需求中保持效率

- 达到目标的方法
	- 基础知识与方法刻在头脑里，使之成为下意识的思维
	- 编程方式或思想的进化-降低思考单元的复杂度（模块分离/复用）
	- 使用和制造自动化工具（开发/测试/发布/运维/监控等各流程的工具）
	- 大块安静的时间

---

20171215
- 每个程序员都应该收藏的算法复杂度速查表 <http://www.techug.com/post/bigo-cheatsheet.html>
- ![算法复杂度](https://github.com/xuqiang76/text/raw/master/img/big_O.png)

---

20171213
- socket 的科普 <https://www.cnblogs.com/kex1n/p/6501977.html>

20171212
- 程序员的使命
	- 实现功能
	- 提高效率（开发效率/运行效率）
	- 持续可变的需求下，项目开发的稳定性（效率保持）

---

20171126
- go 网络编程简介
	- tcp 服务器 / 客户端
	- runtime 事件轮询机制
	- go 近似函数式编程

---

20171126
- 最近关于“红黄蓝幼儿园”虐童性侵案的新闻很多，mark一下，希望几年后不要忘记这件事，到时候再看看有没有可能真相。
- 去年雷阳案大家估计都快忘记了，忘记了也就没有人关注以后有没有真相了。

---

20171117
- 现在的人工智能只能称之为“人工智能算法”

---

20171030
- 不自信的人容易发脾气，使事情变得更糟；成熟的人应该接受自己的自卑与渺小，同时满足于自己的能力足够生活之用，并提高自己的能力。

- 软件开发的历史 就是不断的把共用的功能提取出来
    - 函数
    - 操作系统
    - runtime环境
    - 虚拟机语言
    - 浏览器客户端 web服务器
    - 数据库系统
    - 各种开发框架
    - 。。。

- 软件开发的历史 也是编程语言进化的历史 主线是降低逻辑复杂度（目的是缩小相关性的影响范围）
    - 结构化编程 
    - 面向对象编程
    - 函数式编程 或者 混合式编程

- 不要让你擅长的技术限制了你，得去看新的边界；多学习能使你融会贯通。

---

20171025
- 软件的历史就是不断的把共用的功能提取出来（函数，操作系统，runtime环境，虚拟机语言，浏览器客户端，web服务器，数据库系统，各种开发框架。。。）

---

20171016
- 算法（有穷规则的集合，这些规则是运算序列）
	- 有穷性（执行有穷步之后结束；不具备有穷性的步骤，可以叫做“计算方法”）
	- 确定性
	- 输入（0或多个输入）
	- 输出（1或多个输出）
	- 能行性（能够精确的进行）

---

20171008
- 函数式
	- 高阶函数
	- 闭包
	- 递归（不是必须，目的是不使用状态）
	- 柯里化（不是必须，对于并发编程更安全，使用通道也能达到安全）
	- lambda表达式（不是必须，指定计算顺序，同上）
	- 记忆和缓存（不是必须，适用于同一函数多次重复参数的计算）
	- 缓求值（不是必须）（惰性求值，节省内存）（执行代码的先后顺序无关的情况下才能有用）
	- 少量的数据结构（100个函数操作一种数据结构的组合，要好过10个函教操作10种数据结构的组合 -- Alan Pcrlis）
	- 模式设计的变更（结构复用 到 函数复用）
	
- 我们的目标是愉快高效的编程
	- 严格意义上的函数式编程意味着不使用可变的变量，赋值，循环和其他命令式控制结构进行编程。
	- 建议使用混合方式编程 函数式和指令式编程相结合的方式。函数式把思考限制在一个函数内，同时也吸取指令式编程的优点。
	
---

20171007
- 《深度学习》[美]Ian Goodfellow（伊恩·古德费洛）[ /2017-07-01 /人民邮电出版社
- go语言使用会多起来，node.js越来越少

---

20171006
- 结构化编程 面向对象编程 函数式编程，目的是缩小相关性的影响范围（降低逻辑复杂度）。

---

20170921
- 先驱者 <https://coolshell.cn/articles/11928.html>

---

20170921
- golang协程；runtime
- Docker

---

20170915
- 快速迭代产品的稳定性
	- 修改的代码影响范围（确定影响单一功能的修改，比较好）。
	- 测试深度（技术测试/测试人员的测试/用户测试），如果深度不够，只能去用户测试就是产品质量不稳定。
	- 上线时间：时间确保上线以后开发人员持续在线，因为在发布之后出问题的影响面积更大。
	- 新功能/新技术的加入要慎重（测试时间和上线遇到的问题修改时间都要计算进项目时间里），是涉及到第三方的时候，第三方的技术稳定性调研也很重要。
	- 永远不要跳过流程。

---	

20170915
- 健康/教育/金融，未来

---

20170905
- 有一种病，姑且称为“名校病”，少年时期的成功经历使他们过于自负，看不到客观上真实存在的大部分事实。	——傻大猫

---

20170905
- 人生中重要的，是关注那些真正的问题（real problem），而不是陷入那些没有意义的琐碎问题（trivial problem）。 	——Joel Spolsky在耶鲁大学的演讲

- 一个普通工作人员和一个领袖之间的差别，就是有没有良好的表达能力。	——Joel Spolsky在耶鲁大学的演讲

---

20170904

#### mysql索引的使用概要（innoDB 引擎）

- 了解数据库引擎的存储与查询原理
- 评估应用表在目前和未来的数据量（数据量大小决定索引的使用）
- 尽量把运算放在web端，而不是DB端（这是个大方向，具体也要灵活运用）
- EXPLAIN语句来检验查询的执行情况
- 选择性最大/频率最大/设计功能相关/覆盖索引/前缀索引/非等值运算转变成等值运算
- NULL值/mysql函数

---

20170831
- 工作是属于公司的，而职业生涯却是属于你自己的。	——厄尔•南丁格尔

---

20170810
- ao
- ![ao](https://raw.githubusercontent.com/xuqiang76/text/master/img/aaaaoo.jpg)

---

20170818
- 为什么要持续优化
- ![为什么要持续优化](https://raw.githubusercontent.com/xuqiang76/text/master/img/time_job.png)

---

20170818
- program
- ![worker](https://raw.githubusercontent.com/xuqiang76/text/master/img/worker.jpg)

---

20170818
- 当今，将需求明确到机器可执行的细致程度的文档，只有代码。
- 也许也许也许，人脑与电脑完美连接，人工智能的进步，能使我们看到代码消失的一天。

---

20170814
- 软件工程，目的是提升团队效率，主要是解决以下几个方面问题
	- 沟通效率（敏捷团队，远程团队；功能文档，代码，注释）
	- 自动化技术工具
	- 程序员的时间，大块的/头脑清晰的/安静的

---

20170805
- 学一样可以改变你人生的东西可能只需要几十个小时，；可是年复一年的，我们这么多年都没有拿出这几十个小时。
- 如果你不征服自己，你就会被自己征服。——拿破仑•希尔
- 我们读一本书/看一场电影/经历一些事情，不是为了评价别人/别事，而是完善我们自己；所以要学以致用，不要走马观花
- 所谓技术管理：让别人做你想做的事情的唯一方法就是让他们自己也想做这件事

---

20170804
- 书
	- 软技能：代码之外的生存指南
	- 七周七并发模型
	- 七周七语言

---

20170728
- 学习计划
	- 人工智能/机器学习
	- 区块链技术
		- http://www.8btc.com/ebook-blockchain
		- http://8btc.com/topic-mastering-bitcoin.html
	- 去中心社交
		- http://www.oschina.net/p/mastodon
		- https://github.com/tootsuite/mastodon
		- http://www.oschina.net/news/84518/mastodon-1-3-3
		- https://mastodon.social/about/more
		- https://mstdn.jp/web/getting-started

---

20170728
- 什么是真正的程序员？
	- http://kb.cnblogs.com/page/570194/
	- 解决真正问题的程序员，而不是解决编程问题的程序员
	- 那么真正的问题是什么呢？

---
	
20170728
- 技术管理梗概
	```
	- 99%的公司都不会正确的技术管理；
	- 当今，技术资源是稀缺资源；与低门槛劳动力的管理有区别；
	- 研发团队：团队与个人的区别；
	- 目的：效率，成本，稳定性；
	- 解决方法：自动化，流程化，成长化，价值观人生观成长（符合理性客观商业），因才施治，主动性；
	```
	
---	

20170512
- effect code
	```
	如果其他类型更适合，则尽量避免使用字符串；尽量少使用多个字符串连接；
	返回值类型为数组的没理由返回NULL；
	为继承而设计的类提供文档，其他类禁止继承；
	符合优先于继承；不同包的继承打破了封装性，特别是超类不是为了继承而设计的时候；可以用符合+转发机制代替继承；
	区分接口继承和实现继承；
	绝不要重新定义继承而来的缺省参数值；
	```

---	

20170511	
- 研发/发布/运维
	```
	1.系统可用性时间表，普通web变成对比；（基本：99.9% 目标：99.99% 每天整个系统250万次请求少于250个错误；年服务不可用时间52.56分钟；）
	2.能自动化的，手动性的，重复性的，有长期价值的，与业务同步线性增长的；
	3.发布，强调文档流程化，注意备份与恢复能力，做一些自动化，少改动代码，多通过配置做；(测试环境与正式环境：按流程覆盖测试，改动最少量的配置或者代码再发布)
	4.测试，白盒动态自动化测试，依赖于版本功能的稳定；白盒静态测试， review 代码；
	5.监控，自动化，报警，工单，日志；
	6.代码，自动化生成，简单化（代码自说明，最小功能api，模块化），最常用的重复代码提出来；同步/异步/进程/用户压力/远程访问；（引用与复制）数组/对象/字符串；
	7.第三方软件和服务的依赖，版本，稳定性；
	8.成本与收益；
	9.事后总结，针对具体事，分析根源，解决方案；
	```

---

20170511
- 相忘于江湖	

---

20170427
- golang 
	写的挺好
	http://www.oschina.net/news/80938/why-2017-you-have-to-learn-go?winzoom=1

---

20170427
- 驼峰式和下划线写法
	
	```
	早期C语言中，大多是下划线，而Windows下，c++大微软的东西很多都是驼峰。C#、Java、golang官方基本都是驼峰。下划线有 python 、SQL 等。另一个原因 就是 微软的msdn 和 java 官方用的驼峰，商务上的力量也很大。早期有些语言没法用驼峰  因为不区分大小写。傻大猫觉得下划线写法更有利于阅读，驼峰打字更快，个人更倾向于好的阅读性。特别是大写的简称用下划线更清晰，例如：get_HTML_or_XML，getHTMLOrXML
	```

---
	
20170322
- 修炼武功也要修心（业务能力和世界观）

---

20170320
- php编码规则（傻大猫）
	
	```
	退行4个空格(或者tab转化成4空格；不直接用tab)
		常量 大写字母和下划线 CAPS_SNAKE_CASE
		类名/接口名 每个单词首字母大写 PascalCase
		局部变量/静态变量/全局变量 小写字母和下划线 snake_case  
		函数名/方法名  小写字母和下划线 snake_case  
		私有方法名  下划线开头	_snake_case
		所有{}都放在行首
		尽量不使用全局变量，多用静态类变量或者类常量和命名空间
		文件路径使用小写字母
		任何运算符左右各加一个空格
		
	框架实现 
		单元测试/ MVC/ 配置文件读取/ 数据库连接/ 数据持久层（M）/ 数据库执行动作封装/ IOC控制的反转（根据注入来实例化service）/ AOP面向切面编程（静态代理，动态代理invoke，前置增强before，后置增强after，环绕增强around）/ 事物transaction管理代理（数据库，锁）/ 分离模块（用户安全模块，认证，授权，会话管理，加密）/ 
	```

---

20161227	
- 技术人员常见的一个问题就是：一个东西，自己会别人不会，就瞧不起别人；自己不会，别人会，就瞧不起这东西。

---

20161201
- swoole 长连接服务器		http://wiki.swoole.com/

---

20161223
- 雷洋案的想法
	
	```
	北京检方2016年12月23日新闻：不起诉邢某某等五名雷洋案涉案警员；2016年5月7日晚，雷洋离家后身亡；
		警方叙述详情有各种网站转载；共识是雷洋在店外被怀疑性交易，被追赶并抓获，途中企图逃跑。正常的扫黄是要现场人赃并获的，雷洋案这种在店外被怀疑并暴打的不符合警方扫黄的一贯方式，我猜雷洋是干了或看到了别的什么事情才被警察抓。
	```
		
---

20161009	
- php mysql 一部连接池调研
	
		https://my.oschina.net/matyhtf/blog/223780
		http://doc3.workerman.net/worker-development/__construct.html
		事务处理部分是个问题

---

20160918	
- 如果一个人对现状不满，想要改变，就得改变认知，改变自己的时间使用。在一个人群里趋同，那就接受这个人群的现状。

---

20160909	
- 雷洋案不再有网路报道了，悲哀；警方漏洞百出自相矛盾的证据（各种时间上疑点;在无摄像头的离按摩店很远的地方抓嫖？抓嫖只抓雷洋不用按摩店的小姐么？）
人已经死了，悲哀的社会，社会需要更多的杨佳。

---

20160819	
- 不要让你擅长的技术限制了你，得去看新的边界

---

20160819
- 越是复杂的事物，越是容易出错。

---

20160819
- 发现工作中的低效率，并改进，就是牛逼了；如果能预先安排好你的大部分事情/时间/顺序，就牛逼+++

---

20160729	
- 有没有一种语言编译和测试类似java，执行的时候类似C语言；这样开发效率和执行效率都高了；
- 会有哪些问题需要解决呢（动态分配的内存的管理是个问题）。
- 不管怎么说，java的理念代表了编程发展方向，以人为本
- GoLang / Rust

---

20160707
- 京津冀一体化，将成为大北京了

---
	
20160704
- 英国政治颇有道家特点
- 人类的使命是传承与发展

---

20160701	
- 道德经

	```
	上士闻道，勤而行之；中士闻道，若存若亡；下士闻道，大笑之。
	不笑不足以为道。故建言有之：明道若昧，进道若退，夷道若纇。
	上德若谷；大白若辱；广德若不足；建德若偷；质真若渝。
	大方无隅；大器晚成；大音希声；大象无形；道隐无名。
	夫唯道，善贷且成。
	
	名与身孰亲？身与货孰多？得与亡孰病？甚爱必大费，多藏必厚亡。故知足不辱，知止不殆，可以长久。	
	
	天下有道，却走马以粪，天下无道，戎马生于郊。祸莫大于不知足；咎莫大于欲得。故知足之足，常足矣。
	
	我有三宝，持而保之：一曰慈，二曰俭，三曰不敢为天下先。慈故能勇；俭故能广；不敢为天下先，故能成器长。
	
	善为士者，不武；善战者，不怒；善胜敌者，不与；善用人者，为之下。是谓不争之德，是谓用人之力，是谓配天古之极。
	
	知不知，尚矣；不知知，病也。圣人不病，以其病病。夫唯病病，是以不病。
	```

---	

20160628	
- 生而不有，为而不恃，长而不宰，是谓玄德

---

20160617
- 社保缴费又涨，国家抢钱呢

---

20160617
- 忙乱就会降低质量，个人压力也大（忙中出错）

---

20160531
- 计算机软件开发为什么这么麻烦？因为它本身就不成熟，总会遇到很多问题，工作压力也就大

---

20160525		
- “罗辑思维”节目越来越差了

---

20160512		
- “银行卡一直在身上，钱却没了”，对于这件事，我们一直纠缠在那些制造假POS机、搞木马短信的人的身上，一直忽略了最大的真凶：银行内部员工！(腾讯财经)

---

20160512
- N个银行卡，N个网银，真麻烦，我是专业做金融的么？交个交通违规罚款也得办个特定的工行信用卡，什么时代了，还这么垄断。

---

20160511	
- 我看小米手机在走下坡路，小米手机就知道薄，有个P用；一堆问题不解决：散热问题，gps信号 ，耳机插孔，系统越来越卡，各种问题。

---

20160510	
- 计算机开发人员应该从技术能力和职业习惯（或者叫做职业态度）两方面都成长；一个程序员平时日常的事总是失控，谁敢让他负责重要的任务呢？

---

20160426
- 关于计算机技术的学习，不要为了技术而学技术，要以目标为导向，不是学技术去炫耀，不是为了钻牛角尖，不是为了讨论的时候多说几个名词；我们要知道自己的目的，站起来想想自己的最终目标吧

---

20160426
- 预估时间
	
	```
	考虑全面（编码时间/新技术学习曲线/出问题概率/解决问题时间/单元测试时间/稳定性/bug修改时间/系统测试）
	公司战略会以你的预估时间为依据制定战略，按部就班的展开，所以要保证能完成的一个预估时间，一旦承诺了就必须去完成。
	```

---

20160425	
- 程序员相关（读书笔记《程序员的职业素养》附录）
	
	```
	源代码控制
		永远不要commit没有测试的代码，永远不要
		cvs（不擅长重命名和删除目录）/svn（不擅长分支）/git（本地的/擅长版本分支）
	开发环境/编辑器
		vi（快速流畅/可以编辑任何语言/不用鼠标提高打字速度/练习难度很大/专业身份的象征，无意义）
		Emacs（比vi更强大的万能编辑器/没几个人用/太难了）
		使用鼠标的各种IDE（入门曲线低/功能强/需要鼠标降低打字速度/但是打字速度不是编程的最终瓶颈）
	持续构建/自动构建
		C以前的构建麻烦
		现在的解释型语言方便
	单元测试工具（可以是自己做的/也可以是第三方的）
		原则：编写测试快速/容易
	集成测试
	UML/MDA（模型驱动的构架方式）
		解决编写代码的问题，可是代码从来都不是问题
	
	sublime / SV code
	20170714 补充
	```

---

20160323	
- 车轮一定要圆啊（车圈圆/车胎圆）。自行车真谛

---

20160321
- 0320岳父生日，寄了一本书

---

20160317
- php 编码规则（傻大猫）
	```
	编码规则永远以可读性为第一原则，永远！！！
	退行4个空格
	常量 大写字母和下划线 CAPS_SNAKE_CASE
	类名/接口名 每个单词首字母大写 PascalCase
	局部变量/静态变量/全局变量 小写字母和下划线 snake_case  
	函数名/方法名  小写字母和下划线 snake_case
	私有方法名  下划线开头	_snake_case
	所有{}都放在行首
	static在可见性之后 public static
	abstract（或final）在可见性之前 abstract public function
	尽量不使用全局变量，用静态类变量或者类常量
	```

---

20160316
- 315越来越没意思了，国企的都不报（比如平安保险金赛银事件），只报一点小的民企；315已经成为阻碍经济发展的拖油瓶了哦（保护老旧势力，遏制新型的产业）
- 前天和龙猫吵架，昨晚撞车了

---

20160307
- 今早没去送小猫去幼儿园，内疚一整天
- 消息队列 看看学习一下
- redis 看看学习一下

---

20160304
- 码农和程序员的区别就是后者会用工具

---

20160301
- 只要你这个项目做出来不需要太多其他人参与的，做出来对大家都是有益的，这些项目是容易成功的（facebook）

---

20160301	
- 对于企业级开发，php框架（php语言和第三方框架有些倾向于小系统开发（个人开发/草根开发）的功能，在企业级开发中应该注意）
- 框架自己做URLRewrite没必要；
- 数据库适配层没必要；
- 自动load必要性待讨论（java框架做这个了么）；
- require_once 和 require 的讨论；	

---

20160301
- 兼容多种数据库的数据库适配层的优缺点：
	- 优点：它可以切换不同的数据库；它可以同时使用多种数据库；
	- 缺点：要学习多出来这层的语法；灵活性差；数据库索引效率不明确；分库分表做数据负载均衡麻烦；
	- 所以数据库适配层适合小网站，个人站长；企业级的开发就很少用了；

---

20160225
- 遇到具体问题问别人，上网复制代码，这样永远是low阶；系统的学习才是王道	

---

20160219
- 爱吃甜食的人把糖戒掉，身体2月全面变好了

---
	
20160219
- 团队代码规范很重要很重要
- 关于拐卖儿童的事，民间很积极，国家唉不作为
- applePay现在的支付过程不行哦，要有闪付终端，怎么和支付宝/微信支付竞争哦；银联不是上帝，用户才是上帝

---

20160218
- 春节看了（孙悟空三打白骨精）（美人鱼），觉得三打白骨精拍的更好一些

---

20160218
- 降息到底可以买房；
- 固定资产和现金类资产比例各占一半；
- 保持6个月正常支出的活期存款；
- 现在买点指数基金；

---
	
20160218
- 今年这个季节流感特别严重，得注意啊。
- 众所周知，程序员在大部分时间并没有在打字，而是在思考。

---

20160201
- 遇到问题先别想解决办法，要先看问题来源
- 知人者智，自知者明（明的人很少啊）

---

20160104
- 要读书

---

20151021
- 当当网的技术太差了，一个购物车页面乱跳

---

20151021
- 接口就是其它类需要实现的行为模板
	即便两个接口方法定义相同，接口中没有方法实现，类中也只有一个方法实现。
	Java的接口是可以实现多继承的，类不允许多继承。如下示例：public interface Test extends A,B 
	：try块不能单独存在，后面必须跟catch块或者finally块
	无论try块是否抛出异常，都会执行finally块。

---	

20151020
- 矿泉水vs纯净水
	http://www.zhihu.com/question/20418550/answer/15101384
	价格允许的情况下纯净水是很好的选择，再也不要迷信用水补充微量元素的说法了。且纯净水因为去离子化的原因，没有水垢、几乎无味等等，大大提升了喝水的体验。

---

20151009
- campagnolo record 9速全金属套件收藏

---

20151009	
- 二手汽车O2O 市场需要至少2年成长，假单的情况也不是正道啊

---

20150901
- 神马小牛电动车，都是low货；我自己搞个200km续航的电动助力车还是超轻的；

---

20150827
- 再次收快递，千万别用申通快递

---

20150824		
- fulcrum R3轮组还挺保值

---	

20150822
- 大圣归来 垃圾
	豆瓣的伪文青评分真不靠谱
	你看的各种动漫越多就会从这部动画里看到越多的抄袭痕迹，素材都是拿现成的改一下就上，主角形象丑的一塌糊涂；
	再说情节无脑型，气氛没烘托到位就哭的一逼，看的莫名其妙。
	看了大圣归来，我要记住导演主美等等人，以后这些人相关的东西就不要看了

- 软件工程的目标
	开发速度；
	可维护性；
	满足功能需求；
	
- 申通快递最垃圾
---

20150702
- 小牛电动车是个忽悠
	20150616
	20km/小时的模式下 气温好的条件下 可连续100km
	弄个摩托车那么粗的轮子 让你20速度续航也没啥意义 只有费电
	装了个锂电池 就来忽悠啊
	还搞众筹  多么的无力啊
	
- 两对cacmpagnolo record ，一对 shimano DURA ACE 花鼓，小小的圆满一下了
---

20150523
- 一万小时定律。西蒙和蔡斯 40年前写下的结论如今还是正确的。在对认知水平要求很高的领域，天才并不存在。
	http://www.guokr.com/article/437379/


- glob
- use
__DIR__  ：The directory of the file. If used inside an include, the directory of the included file is returned.
- spl_autoload_register 
---

20150523
- 国内技术发展阶段

	1. 学一门语言就开始开发的阶段（20世纪末）
	2. 学习开源代码，理解工程化开发，改进一些源码在应用构架里使用（21世纪初）
	3. 参考一些国外的理论，自主研发系统（现在有一些）
	4. 提出新的理论，推动技术发展（未来希望是）
---