<?php
namespace bigcat\model;

use bigcat\inc\BaseObject;
use bigcat\inc\BaseFunction;
class User extends BaseObject
{
    const TABLE_NAME = 'user';

    public $uid;	//用户id
    public $key = '';	//登录key
    public $wx_openid = '';	//微信openID
    public $wx_pic = '';	//用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。
    public $name = '';	//用户名字

    public $sex = 0;	//用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
    public $province = '';	//省
    public $city = '';	//市
    public $init_time = 0;	//创建时间
    public $update_time = 0;	//更新时间

    public $login_time = 0;	//最后登录时间
    public $real_name_reg = ''; //实名制登记
    public $status = 0;	//状态(0正常  1黑名单)

    public function getUpdateSql() 
    {
        return "update `user` SET
            `key`='".BaseFunction::my_addslashes($this->key)."'
            , `wx_openid`='".BaseFunction::my_addslashes($this->wx_openid)."'
            , `wx_pic`='".BaseFunction::my_addslashes($this->wx_pic)."'
            , `name`='".BaseFunction::my_addslashes($this->name)."'

            , `sex`=".intval($this->sex)."
            , `province`='".BaseFunction::my_addslashes($this->province)."'
            , `city`='".BaseFunction::my_addslashes($this->city)."'
            , `init_time`=".intval($this->init_time)."
            , `update_time`=".intval($this->update_time)."

            , `login_time`=".intval($this->login_time)."
            , `real_name_reg`='".BaseFunction::my_addslashes($this->real_name_reg)."'
            , `status`=".intval($this->status)."

            where `uid`=".intval($this->uid)."";
    }

    public function getInsertSql() 
    {
        return "insert into `user` SET

            `uid`=".intval($this->uid)."
            , `key`='".BaseFunction::my_addslashes($this->key)."'
            , `wx_openid`='".BaseFunction::my_addslashes($this->wx_openid)."'
            , `wx_pic`='".BaseFunction::my_addslashes($this->wx_pic)."'
            , `name`='".BaseFunction::my_addslashes($this->name)."'

            , `sex`=".intval($this->sex)."
            , `province`='".BaseFunction::my_addslashes($this->province)."'
            , `city`='".BaseFunction::my_addslashes($this->city)."'
            , `init_time`=".intval($this->init_time)."
            , `update_time`=".intval($this->update_time)."

            , `login_time`=".intval($this->login_time)."
            , `real_name_reg`='".BaseFunction::my_addslashes($this->real_name_reg)."'
            , `status`=".intval($this->status)."
            
            ";
    }

    public function getDelSql() 
    {
        return "delete from `user`
            where `uid`=".intval($this->uid)."";
    }

    public function before_writeback() 
    {
        parent::before_writeback();
        return true;
    }

}

