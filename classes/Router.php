<?php

namespace BooksLoader\Base;

/**
* Basic Page routing
*/
class Router
{
	public static function route()
	{
		$page = '';

		if (!isset($_GET['page'])) {
			$page = 'home';
		}else {
			$page = $_GET['page'];
		}

		require_once 'templates' . DIRECTORY_SEPARATOR . 'header.php';
		require_once 'templates' . DIRECTORY_SEPARATOR . 'menu.php';
		$pageFile = 'public' . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR . $page . '.php';
		if (file_exists($pageFile) && is_readable($pageFile)) {
			require_once $pageFile;
		}else {
			echo "404 page not found!";
		}

		require_once 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
	}
}