bitcoin

#### go语言节点  https://github.com/btcsuite/btcd
#### go语言钱包 https://github.com/btcsuite/btcwallet

#### c++  https://github.com/bitcoin/bitcoin
    bitcoind --help
    netstat -lnp
    bitcoin-cli help
    通过命令行使用 JSON-RPC API 接口
    curl --user btcuser --data-binary '{"jsonrpc": "1.0", "id":"curltest", "method":"getinfo", "params": [] }' -H 'content-type:text/plain;' http://127.0.0.1:18332/
#### 私钥和公钥
    256位二进制私钥
    椭圆曲线得到公钥    {K = k * G}
    比特币地址 A = RIPEMD160(SHA256(K))
    比特币地址是经过“Base58Check”编码
    数字签名
    libbitcoin-explorer https://github.com/libbitcoin/libbitcoin-explorer/wiki
    密钥的格式 Hex WIF WIF-compressed
    压缩格式公钥
    加密私钥（BIP0038）
        $ bx ec-to-ek "my passphrase" 261fc32e9f29c70e3d898aa7db028c81ede0658e8ff8ffab8160073c048ae83f
    地址 P2PKH  P2SH（BIP0016引进）

#### 钱包
    非确定性（随机）钱包
    确定性（种子）钱包
    分层确定性钱包（HD 钱包 BIP-32/BIP-44)
    mnemonic 助记码词汇（BIP-39）

    bx hd-new  baadf00dbaadf00dbaadf00dbaadf00d
    xprv9s21ZrQH143K3bJ7oEuyFtvSpSHmdsmfiPcDXX2RpArAvnuBwcUo8KbeNXLvdbBPgjeFdEpQCAuxLaAP3bJRiiTdw1Kx4chf9zSGp95KBBR

    bx hd-public xprv9s21ZrQH143K3bJ7oEuyFtvSpSHmdsmfiPcDXX2RpArAvnuBwcUo8KbeNXLvdbBPgjeFdEpQCAuxLaAP3bJRiiTdw1Kx4chf9zSGp95KBBR | bx hd-public | bx hd-public | bx hd-public 

    bx hd-private xprv9s21ZrQH143K3bJ7oEuyFtvSpSHmdsmfiPcDXX2RpArAvnuBwcUo8KbeNXLvdbBPgjeFdEpQCAuxLaAP3bJRiiTdw1Kx4chf9zSGp95KBBR | bx hd-private | bx hd-private | bx hd-public 

    bx hd-to-ec
    bx ec-to-wif    //私钥2WIF格式
    bx ec-to-address    //公钥2地址

#### 交易
    复式记账总账簿
    unspent transaction outputs，即UTXO
    交易结构
        4字节	版本	明确这笔交易参照的规则
        1-9字节	input数量	被包含的输入的数量
        不定	输入	一个或多个交易输入
        1-9字节	out数量	被包含的输出的数量
        不定	输出	一个或多个交易输出
        4字节	时钟时间	一个UNIX时间戳或区块号
    输出结构
        8 bytes 数量
        1-9 bytes locking脚本长度
        variable 可变长度 locking 脚本
    交易输入（见下面挖矿那里）
    交易脚本构建（锁定与解锁）

#### 高级交易和脚本
    多重签名 P2SH
        0 <Signature B> <Signature C> 2 <Public Key A> <Public Key B> <Public Key C> 3 CHECKMULTISIG
        bitcoin-cli createmultisig  2 '["03789ed0bb717d88f7d321a368d905e7430207ebbd82bd342cf11ae157a7ace5fd","03dbc6764b8884a92e871274b87583e6d5c2a58819473e17e107ef3f6aa5a61626"]'
    时间锁（Timelocks）

#### P2P网络架构
    节点的四个功能模块：钱包，矿工，完整的区块链数据库，网络路由

#### 区块链结构
    区块哈希值实际上并不包含在区块的数据结构里，
    区块高度也不是区块数据结构的一部分， 它并不被存储在区块里。
    每一个节点都“知道”创世区块的哈希值、结构、被创建的时间和里面的一个交易。
    bitcoin-cli getblock 000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f
    Merkle树是一种哈希二叉树，它是一种用作快速归纳和校验大规模数据完整性的数据结构。
    简单支付验证（SPV）节点不保存所有交易也不会下载整个区块，仅仅保存区块头。它们使用Merkle路径来验证交易存在于区块中
    testnet
    Regtest
#### 挖矿和共识
    常规交易输入结构
        32 bytes Transaction Hash 引用的交易id
        4 bytes Output Index  引用交易中的第几个vout
        1-9 bytes 解锁脚本长度
        var 解锁脚本
        4 bytes 序号
     coinbase交易输入结构   
        32 bytes Transaction Hash 不引用任何一个交易，值全部为0
        4 bytes Output Index 值全部为1
        1-9 bytes Coinbase 数据长度
        (VarInt) 可变长度  Coinbase数据 (BIP34 版本2)
        4 bytes 序号   值全部为1，0xFFFFFFFF

    构造区块头
        4 bytes Version
        32 bytes 前区块hash
        32 bytes merkle root （需要全部交易的hash组成的树）
        4 bytes 时间戳
        4 bytes target （POW算法难度目标值 编码的首字节表示指数，后面的3字节表示尾数(系数)
        4 bytes Nonce (POW算法用的一个数) ？溢出
    难度的调整是在每个完整节点中独立自动发生的。 每2,016个区块中的所有节点都会调整难度。
    区块链的组装与选择

