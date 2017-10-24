<?php
namespace bigcat\model;

use bigcat\inc\ListFactory;
use bigcat\inc\BaseFunction;

class UserListFactory extends ListFactory
{
    public $key = 'gfplay_mahjong_user_list_';
    public function __construct($dbobj, $wx_openid = null, $id_multi_str='') 
    {
        //$id_multi_str 是用,分隔的字符串
        if($wx_openid) 
        {
            $this->key = $this->key.$wx_openid;
            $this->sql = "select `uid` from `user` where wx_openid='".BaseFunction::my_addslashes($wx_openid)."'";
            parent::__construct($dbobj, $this->key);
            return true;
        }
        elseif ($id_multi_str) 
        {
            $this->key = $this->key.md5($id_multi_str);
            parent::__construct($dbobj, $this->key, null, $id_multi_str);
            return true;
        }
        return false;
    }
}

