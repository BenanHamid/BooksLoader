<?php

namespace BooksLoader\Base;

/**
* Books entity
*/
class Books
{
	private $_db,
			$_books = [],
			$_files = [];

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	public function load($path = null){
		if (!$path) {
			return false;
		}

		$xmlRootFolder = new \RecursiveDirectoryIterator($path);
		$fileType = 'xml';

		foreach(new \RecursiveIteratorIterator($xmlRootFolder) as $file){
			$files = array_flip(explode('.', $file));

			if (isset($files[$fileType])) {
		        $this->_files[] = $file;
		    }
		}

		foreach ($this->_files as $file) {
			$xml = simplexml_load_file($file);
			$blocks = $xml->xpath('//book');

			$this->_books['fileName'][] = $file->getPath() . '/'. $file->getFileName();

			foreach ($blocks as $block) {
				$this->_books['book'][] = $block;
			}
		}

		return $this;
	}

	public function displayData()
	{
		return $this->_books;
	}

	public function upsert(){
		if (!$this->_files) {
			return false;
		}

		$query = "
			INSERT INTO book (author, book_name, book_id) 
			VALUES(?, ?, ?)
			ON CONFLICT (book_id) 
			DO
			 UPDATE
			   SET author = ?,
			   book_name = ?;
		";

		foreach ($this->_books['book'] as $book) {
			$this->_db->query($query, [
				$book->author, 
				$book->name, 
				$book->book_id, 
				$book->author, 
				$book->name
			]);
		}
	}

	public function get($limit = 10, $author = null){
		if (is_null($author)) {
			return false;
		}

		$query = "SELECT author, book_name FROM book WHERE author LIKE '%${author}%' LIMIT ${limit}";

		return $this->_db->query($query);
	}
}