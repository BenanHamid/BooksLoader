<?php
namespace BooksLoader\Base;

require '../vendor/autoload.php';

$bookObj = new Books();

$loadFiles = $bookObj->load('../xmlData');
$result = $bookObj->upsert();