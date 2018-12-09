<?php
namespace BooksLoader\Base;
use PDO;

class DB
{
	private static $instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0,
			$_opt = [
			    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			    PDO::ATTR_EMULATE_PREPARES   => false,
			    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8';"
			];

	private function __construct(){
		try {
			$this->_pdo = new PDO('pgsql:host=' . Config::get('postgres/host') . ';dbname=' . 
				Config::get('postgres/db'), 
				Config::get('postgres/username'),
				Config::get('postgres/password'),
				$this->_opt);
		} catch (PDOException $e) {
			// report error message
 			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if (!isset(self::$instance)) {
			self::$instance = new DB();
		}

		return self::$instance;
	}

	public function query($sql, $params = []){
		$this->_error = false;

		if ($this->_query = $this->_pdo->prepare($sql)) {
			//params
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();

			}else {
				//TODO
				$this->_error = true;
			}
		}

		return $this;
	}

	public function results(){
		return $this->_results;
	}
}