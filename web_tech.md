#### 服务器环境：CentOS 7.X 64位 ####

    first time 2017-09-11
    last time 2018-09-13
    author xuqiang76@163.com

---

#### web 开发

- 全局捕获错误或异常，用log分类记录
- 自动生成代码，例如 对象关系映射（ROM）
- 切片编程（AOP），使用中间件方式做通用功能
- 使用自动格式化工具,统一编码规则
- 多环境（develop test product）自动部署
- 单元测试,技术做自动化测试
- 功能测试，自动化测试 Selenium
- 依赖管理 maven / Composer
- 持续集成指的是，频繁地（一天多次）将代码集成到主干；部署 Docker


---

#### php编程之道
 - <https://phptherightway.golaravel.com/#welcome>
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
- ![参考书《高性能MySQL》](https://github.com/xuqiang76/text/raw/master/img/mysql.png)


#### CAP 定理的含义(分布式系统的三个指标) ####
 - <http://www.ruanyifeng.com/blog/2018/07/cap.html>

#### 加密技术 ####
 - <http://www.ruanyifeng.com/blog/2011/08/what_is_a_digital_signature.html>
 - <http://blog.sina.com.cn/s/blog_148a693f10102vj8m.html>

```
SSH是一种网络协议，用于计算机之间的加密登录。
如果一个用户从本地计算机，使用SSH协议登录另一台远程计算机，我们就可以认为，这种登录是安全的，即使被中途截获，密码也不会泄露。
最早的时候，互联网通信都是明文通信，一旦被截获，内容就暴露无疑。
1995年，芬兰学者Tatu Ylonen设计了SSH协议，将登录信息全部加密，成为互联网安全的一个基本解决方案，迅速在全世界获得推广，目前已经成为Linux系统的标准配置。

口令登录
公钥指纹
当远程主机的公钥被接受以后，它就会被保存在文件$HOME/.ssh/known_hosts之中。
下次再连接这台主机，系统就会认出它的公钥已经保存在本地了，从而跳过警告部分，直接提示输入密码。

公钥登录
用ssh-keygen生成，在$HOME/.ssh/目录下，会新生成两个文件：id_rsa.pub和id_rsa。
远程主机将用户的公钥，保存在登录后的用户主目录的$HOME/.ssh/authorized_keys文件中。
```


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
