<?php
include("conexion.php");
	$id = $_POST['id'];
	$tipo = $_POST['tipo'];
	
	if($tipo==0){
		$query = "SELECT comentario FROM registro_libros WHERE id = '".$id."'";
		$conn = conectar();
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		echo $row['comentario'];
	}
	else if($tipo==1){
		$query = "UPDATE registro_libros set comentario = '".$_POST['comentario']."' WHERE id = '".$id."'";
		$conn = conectar();
		$result = mysqli_query($conn,$query);
	}
	else if($tipo==2){
		$query = "DELETE FROM registro_libros  WHERE id = '".$id."'";
		$conn = conectar();
		$result = mysqli_query($conn,$query);
	}
	
	mysqli_close($conn);
	
?>