

#### go语言节点  https://github.com/btcsuite/btcd
#### go语言钱包 https://github.com/btcsuite/btcwallet

#### c++  https://github.com/bitcoin/bitcoin
    netstat -lnp
    bitcoin-cli help

#### 私钥和公钥
    椭圆曲线
    数字签名
    hash 比特币地址
    libbitcoin-explorer
    密钥的格式 Hex WIF WIF-compressed

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

#### 高级交易和脚本

#### P2P网络架构
    钱包，矿工，完整的区块链数据库，网络路由

#### 区块链结构
#### 挖矿和共识