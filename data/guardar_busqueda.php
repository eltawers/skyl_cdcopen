<?php
include("conexion.php");
	$id = $_POST['id'];
	$selfLink = $_POST['selfLink'];
	$title = $_POST['title'];
	$authors = $_POST['authors'];
	$publisher = $_POST['publisher'];
	$publishedDate = $_POST['publishedDate'];
	$description = $_POST['description'];
	
	$query = "INSERT INTO registro_libros 
	(id_books, selfLink, title, authors, publisher, publishedDate, description,comentario) 
	VALUES ('".$id."',
	'".$selfLink."',
	'".$title."',
	'".$authors."',
	'".$publisher."',
	'".$publishedDate."',
	'".$description."','')";
	$conn = conectar();
	$result = mysqli_query($conn,$query);
	mysqli_close($conn);
	
?>