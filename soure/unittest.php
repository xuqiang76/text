<?php
/**
 * @author xuqiang76@163.com
 * @final 20160929
 */

namespace bigcat;

$data_receive = array();
$data_receive = array_merge($_GET, $_POST, $_COOKIE, $_REQUEST, $data_receive );
$randkey = '';

$_REQUEST = array('randkey'=>$randkey, 'c_version'=>'0.0.1', 'parameter'=>json_encode($data_receive) );

require ("./index.php");

