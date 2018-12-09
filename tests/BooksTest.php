<?php

namespace BooksLoader\Tests;

use PHPUnit\Framework\TestCase;
use BooksLoader\Base\Books;

final class BooksTest extends TestCase
{
 	public function testInstance()
 	{
 		$book = new Books();
 		$this->assertInstanceOf(Books::class, $book);
 	}

 	public function testLoad()
 	{
 		$book = new Books();
 		$stub = $this->createMock(Books::class);

        $stub->method('load')
             ->willReturn($book);

        $this->assertSame($book, $stub->load());
 	}

 	public function testDisplayData()
 	{
 		$stub = $this->createMock(Books::class);

        $stub->method('displayData');

        $this->assertSame(null, $stub->displayData());
 	}
}