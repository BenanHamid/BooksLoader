<?php

namespace BooksLoader\Base;

require '../vendor/autoload.php';

if (isset($_POST['submit_author'])) {
	$author = htmlspecialchars($_POST['field_author']);

	$bookObj = new Books();

	$result = $bookObj->get(10, $author);
	if (!$result) {
		echo false;

		exit;
	}

	$result = $result->results();
	if (count($result) < 1) {
		echo false;
		exit;
	}
	
	print_r(json_encode($result));
	exit;
}