<?php
/**
 * @author xuqiang76@163.com
 * @final 20160929
 */

namespace bigcat\inc;

use bigcat\conf\Config;

class BaseFunction
{
	static $db_instance = null;

	public static function time2str($itime)
	{
		if($itime)
		{
			return date('Y-m-d H:i:s', $itime);
		}
		return false;
	}

	public static function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	public static function output($response)
	{
		self::closeDB();
		
		header('Cache-Control: no-cache, must-revalidate');
		header("Content-Type: text/plain; charset=utf-8");

		if(isset($_REQUEST['callback']) && $_REQUEST['callback'])
		{
			echo $_REQUEST['callback'].'('.json_encode($response).')';
		}
		else
		{
			echo json_encode($response);
		}
	}

	public static function output_html($html)
	{

		header('Cache-Control: no-cache, must-revalidate');
		header("Content-Type: text/html; charset=utf-8");

		echo ($html);
	}

	public static function https_request($url, $data = null)
    {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

	public static function logger($file,$word)
	{
		$fp = fopen($file,"a");
		flock($fp, LOCK_EX) ;
		fwrite($fp,"执行日期：".strftime("%Y-%m-%d %H:%M:%S",time())."\n".$word."\n\n");
		flock($fp, LOCK_UN);
		fclose($fp);
	}

	public static function get_client_ip()
	{
		$s_client_ip = '';

		if (isset($_SERVER['HTTP_X_REAL_IP']))
		{
			$s_client_ip = $_SERVER['HTTP_X_REAL_IP'];
		}
		elseif ($_SERVER['REMOTE_ADDR'])
		{
			$s_client_ip = $_SERVER['REMOTE_ADDR'];
		}
		elseif (getenv('REMOTE_ADDR'))
		{
			$s_client_ip = getenv('REMOTE_ADDR');
		}
		elseif (getenv('HTTP_CLIENT_IP'))
		{
			$s_client_ip = getenv('HTTP_CLIENT_IP');
		}
		else
		{
			$s_client_ip = 'unknown';
		}
		return $s_client_ip;
	}

	public static function getDB()
	{
		//单例
		if( empty(self::$db_instance) || !self::$db_instance->ping())
		{
			@mysqli_close(self::$db_instance);
			self::$db_instance = mysqli_init();
			if (!self::$db_instance->real_connect(Config::DB_HOST, Config::DB_USERNAME, Config::DB_PASSWD, Config::DB_DBNAME, Config::DB_PORT))
			{
				return false;
			}
			self::$db_instance->query("set names 'utf8'");
			mb_internal_encoding('utf-8');			
		}
		//self::logger('./log/db.log', "【Exception】:\n" . var_export(self::$db_instance, true) . "\n" . __LINE__ . "\n");
		return  self::$db_instance;
	}
	
	public static function closeDB()
	{
		//单例
		if( !empty(self::$db_instance))
		{
			@mysqli_close(self::$db_instance);
		}
	}

	public static function execute_sql_backend($rawsqls)
	{
		$result_arr = null;
		$is_rollback = false;

		if(!$rawsqls || !is_array($rawsqls))
		{
			return $result_arr;
		}

		$db_connect = self::getDB();
		$db_connect->autocommit(false);
		foreach ($rawsqls as $item_sql)
		{
			$result = null;
			$result = $db_connect->query($item_sql);
			if(!$result)
			{
				if($db_connect->rollback())
				{
					$is_rollback = true;
				}
				else
				{
					$db_connect->rollback();
					$is_rollback = true;
				}
				$result_arr = null;
				break;
			}
			if($db_connect->insert_id)
			{
				$result_arr[] = array('result'=>$result, 'insert_id'=>$db_connect->insert_id);
			}
			else
			{
				$result_arr[] = array('result'=>$result);
			}
		}

		if(!$is_rollback)
		{
			$db_connect->commit();
		}
		$db_connect->autocommit(true);
		return $result_arr;
	}

	public static function query_sql_backend($rawsql)
	{
		$db_connect = self::getDB();

		$result = $db_connect->query($rawsql);

		return $result;
	}

	/*
	* @inout $weights : array(1=>20, 2=>50, 3=>100);
	* @putput array
	*/
	public static function w_rand($weights)
	{

		$r = mt_rand(1, array_sum($weights));

		$offset = 0;
		foreach ( $weights as $k => $w )
		{
			$offset += $w;
			if ($r <= $offset)
			{
				return $k;
			}
		}

		return null;
	}

	public static function my_addslashes($str)
	{
		$str = str_replace(array("\r\n", "\r", "\n"), '', $str);
		return addslashes(stripcslashes($str));
	}

}