<?php
namespace BooksLoader\Base;

//this is a workaround for the cronjob
if (file_exists('core/ENV.php')){
	require_once 'core/ENV.php';
}else {
  require_once '../core/ENV.php'; 
}

/**
* Base configurations handling
*/
class Config
{
	public static function get($path = null){
		if ($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			foreach ($path as $bit) {
				if (isset($config[$bit])) {
					$config = $config[$bit];
				}
			}

			return $config;
		}

		return false;
	}
}