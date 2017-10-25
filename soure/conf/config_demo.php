<?php

namespace bigcat\conf;

class Config
{
        const XHPROF = 0;
        
        const C_VERSION = '2.0.5';	//android test version
        const DEBUG = false;    //release version must false
        const PLATFORM = 'gfplay';

        const MC_SERVERS = array(array('127.0.0.1',11211));

        //数据库
        const DB_HOST = '10.23.22.21';
        const DB_USERNAME = 'dbuser';
        const DB_PASSWD = 'DB@passwd';
        const DB_DBNAME = 'test_game_sx';
        const DB_PORT = '3306';

}