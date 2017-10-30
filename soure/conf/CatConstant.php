<?php
/**
 * @author xuqiang76@163.com
 * @final 20160929
 */

namespace bigcat\conf;

class CatConstant
{
	const LOG_FILE = './log/log.log';
	const CACHE_TYPE = '\bigcat\inc\CatMemcache';

	const OK = 0;
	const ERROR = 1;
	const ERROR_MC = 2;
	const ERROR_INIT = 3;
	const ERROR_UPDATE = 4;
	const ERROR_VERIFY = 5;
	const ERROR_ARGUMENT = 6;
	const ERROR_VERSION = 7;

	const MODELS = array('Business' => '\bigcat\controller\Business');

	const SUB_DESC = array(
    	'Business_login' => array('sub_code_1'=>'用户登录失败')
	   ,'Business_login_check' => array('sub_code_1'=>'用户登录失败')
 	);

}
