<?php
/**
 * @author xuqiang76@163.com
 * @final 20160929
 */

namespace bigcat\controller;

use bigcat\conf\Config;
use bigcat\inc\BaseFunction;
use bigcat\conf\CatConstant;


use bigcat\model\User;
use bigcat\model\UserFactory;

class Business
{
	private $log = CatConstant::LOG_FILE;
	private $login_timeout = 60480000;	//3600 * 24 * 7	 * 100
	private $cache_handler = null;

	public function __construct()
	{
	}

	private function _init_cache()
	{
		if( empty($this->cache_handler) )
		{
			$tmp = CatConstant::CACHE_TYPE;
			$this->cache_handler = $tmp::get_instance();
		}
	}

	////////////////////////////////////////////////////////////////////////

	//登录
	public function login($params)
	{
	}

	//检验用户登录状态（key值）
	public function login_check($params)
	{
		$response = array('code' => CatConstant::OK,'desc' => __LINE__, 'sub_code' => 0);
		//$rawsqls = array();
		$itime = time();
		$data = array();

		do {
			if( empty($params['uid'])
			|| empty($params['key'])
			)
			{
				$response['code'] = CatConstant::ERROR; $response['desc'] = __LINE__; break;
			}

			$is_login = 0;
			$this->_init_cache();

			$obj_user_factory = new UserFactory($this->cache_handler, $params['uid']);
			if(!$obj_user_factory->initialize() || !$obj_user_factory->get())
			{
				$obj_user_factory->clear();
				$response['code'] = CatConstant::ERROR_INIT; $response['desc'] = __LINE__; break;
			}

			$obj_user = $obj_user_factory->get();

			if(!empty($obj_user->status))
			{
				$response['code'] = CatConstant::ERROR; $response['desc'] = __LINE__; break;
			}

			if( isset($obj_user->key) && $obj_user->key == $params['key'] && ($itime - $obj_user->login_time) < $this->login_timeout)
			{
				$is_login = 1;
			}
			else
			{
				BaseFunction::logger($this->log, "【obj_user】:\n".var_export($obj_user, true)."\n".__LINE__."\n");
				$response['code'] = CatConstant::ERROR; $response['desc'] = __LINE__; break;
			}

			$data['is_login'] = $is_login;
			$data['user'] = $obj_user;
			$response['data'] = $data;
		}while(false);

		return $response;
	}

	//退出登录状态
	public function logout($params)
	{
		$response = array('code' => CatConstant::OK,'desc' => __LINE__, 'sub_code' => 0);
		$rawsqls = array();
		$itime = time();
		$data = array();

		do {
			if( empty($params['uid'])
			|| empty($params['key'])
			)
			{
				$response['code'] = CatConstant::ERROR; $response['desc'] = __LINE__; break;
			}

			$this->_init_cache();
			$obj_user_factory = new UserFactory($this->cache_handler, $params['uid']);
			if(!$obj_user_factory->initialize() || !$obj_user_factory->get())
			{
				$obj_user_factory->clear();
				$response['code'] = CatConstant::ERROR_INIT; $response['desc'] = __LINE__; break;
			}

			$obj_user = $obj_user_factory->get();
			if( !empty($obj_user->key) && $obj_user->key != $params['key'])
			{
				$response['code'] = CatConstant::ERROR; $response['desc'] = __LINE__; break;
			}
			$obj_user->key = '';
			$obj_user->update_time = $itime;

			$rawsqls[] = $obj_user->getUpdateSql();
			if($rawsqls && !BaseFunction::execute_sql_backend($rawsqls))
			{
				BaseFunction::logger($this->log, "【rawsqls】:\n".var_export($rawsqls, true)."\n".__LINE__."\n");
				$response['code'] = CatConstant::ERROR_UPDATE; $response['desc'] = __LINE__; break;
			}
			$obj_user_factory->writeback();
			$response['data'] = $data;

		}while(false);

		return $response;
	}

}

