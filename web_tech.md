#### 服务器环境：CentOS 7.X 64位 ####

    first time 2017-09-11
    last time 2018-09-13
    author xuqiang76@163.com

---

#### 加密 哈希

- 随机程序生成/自己写的 ------》 私钥
- 私钥 ---算法（不可逆）---》 公钥
- 明文 ---私钥加密---》 密文 ---公钥解密---》 明文
- 明文 ---公钥加密---》 密文 ---私钥解密---》 明文
- 内容 ---哈希算法（不可逆）---》 摘要（不可解密还原）
- 加密 用于内容加密解密；哈希 用来验证内容是否被篡改
- 签名 哈希摘要和私钥加密混合使用，验证内容是你发的而且没有被篡改

---

#### mysql索引的使用概要（innoDB 引擎）

- 索引是存储引擎用于快速找到记录的一种数据结构；这是索引的基本功能
- 评估数据表在目前和未来的数据量（数据量大小/变化频率，决定使用方式）（TB级别，块方式）
- 了解数据库存储引擎原理（有序的树结构 B-TREE）
- 尽量把运算放在web端，而不是DB端（这是个大方向，具体也要灵活运用）
- EXPLAIN语句来
- 选择性最大/频率最大/设计功能相关/覆盖索引/前缀索引/非等值运算转变成等值运算
- NULL值/mysql函数
- 对象操作数据/原子sql/并发/事物处理（锁）
- 参考书《高性能MySQL》

#### CAP 定理的含义(分布式系统的三个指标) ####
 - <http://www.ruanyifeng.com/blog/2018/07/cap.html>

#### 加密技术 ####
 - <http://www.ruanyifeng.com/blog/2011/08/what_is_a_digital_signature.html>

#### TCP ####
 - <http://www.ruanyifeng.com/blog/2017/06/tcp-protocol.html>

#### http ####
 - <http://www.ruanyifeng.com/blog/2016/08/http.html>

#### 函数式编程 ####
 - <http://www.ruanyifeng.com/blog/2012/04/functional_programming.html>

#### 互联网协议 ####
 - <http://www.ruanyifeng.com/blog/2012/05/internet_protocol_suite_part_i.html>
 - <http://www.ruanyifeng.com/blog/2012/06/internet_protocol_suite_part_ii.html>

#### 操作系统 ####
 - <>


 - <>
 - <>
 - <>
 - <>
