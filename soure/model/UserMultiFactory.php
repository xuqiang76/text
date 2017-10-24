<?php
namespace bigcat\model;

use bigcat\inc\MutiStoreFactory;
use bigcat\inc\BaseFunction;
class UserMultiFactory extends MutiStoreFactory
{
    public $key = 'gfplay_mahjong_user_multi_';
    private $sql;

    public function __construct($dbobj, $key_objfactory=null, $uid=null, $key_add='') 
    {
        if( !$key_objfactory && !$uid )
        {
            return false;
        }
        $this->key = $this->key.$key_add;
        $ids = '';
        if($key_objfactory) 
        {
            if($key_objfactory->initialize()) 
            {
                $key_obj = $key_objfactory->get();
                $ids = implode(',', $key_obj);
            }
        }
        $fields = "
            `uid`
            , `key`
            , `wx_openid`
            , `wx_pic`
            , `name`

            , `sex`
            , `province`
            , `city`
            , `init_time`
            , `update_time`

            , `login_time`
            , `real_name_reg`
            , `status`
            ";

        if( $uid != null )
        {
            $this->bInitMuti = false;
            $this->sql = "select $fields from user where `uid`=".intval($uid)."";
        }
        else
        {
            $this->sql = "select $fields from user ";
            if($ids)
            {
                $this->sql = $this->sql." where `uid` in ($ids) ";
            }
        }
        parent::__construct($dbobj, $this->key, $this->key, $key_objfactory, $uid);
        return true;
    }

    public function retrive() 
    {
        $records = BaseFunction::query_sql_backend($this->sql);
        if( !$records ) 
        {
            return null;
        }

        $objs = array();
        while ( ($row = $records->fetch_row()) != false ) 
        {
            $obj = new User;

            $obj->uid = intval($row[0]);
            $obj->key = ($row[1]);
            $obj->wx_openid = ($row[2]);
            $obj->wx_pic = ($row[3]);
            $obj->name = ($row[4]);

            $obj->sex = intval($row[5]);
            $obj->province = ($row[6]);
            $obj->city = ($row[7]);
            $obj->init_time = intval($row[8]);
            $obj->update_time = intval($row[9]);

            $obj->login_time = intval($row[10]);
            $obj->real_name_reg = ($row[11]);
            $obj->status = intval($row[12]);

            $obj->before_writeback();
            $objs[$this->key.'_'.$obj->uid] = $obj;
        }
        $records->free();
        unset($records);
        return $objs;
    }
}


