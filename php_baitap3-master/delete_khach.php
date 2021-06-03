<?php 

		include('inc/connect.php');
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$query = "DELETE FROM speaker WHERE id_speaker= '$id'";
		   mysqli_query($mysqli,"DELETE FROM speaker WHERE id_speaker= '$id'");
		   var_dump(mysqli_query($mysqli,$query));
			header('location: list_khach.php');
		} 
?>