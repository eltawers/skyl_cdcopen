<?php
$book = $_POST['books_name'];
$res = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$book);
echo $res;
?>