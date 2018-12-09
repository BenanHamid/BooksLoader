<?php

namespace BooksLoader\Tests;

use PHPUnit\Framework\TestCase;
use BooksLoader\Base\DB;

final class DBTest extends TestCase
{
	public function testInstance()
 	{
 		$db = DB::getInstance();
 		$this->assertInstanceOf(DB::class, $db);
 	}

 	public function testQuery()
 	{
 		$db = DB::getInstance();
 		$stub = $this->createMock(DB::class);
 		$query = 'SELECT * FROM BOOK';

        $stub->method('query')
         		->willReturn($db);

        $this->assertSame($db, $stub->query($query, []));
 	}
}