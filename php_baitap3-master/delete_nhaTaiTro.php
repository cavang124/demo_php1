<?php 

		include('inc/connect.php');
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$query = "DELETE FROM donors WHERE id= '$id'";
		   mysqli_query($mysqli, $query);
		   var_dump(mysqli_query($mysqli,$query));
			header('location: list_nhaTaiTro.php');
		} 
?>