<?php 
include('inc/check_session.php');
include('includes/header.php'); 
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-1 col-xs-12 col-sm-12">
		<?php
			//,FILTER_VALIDATE_INT, array('min_ranger '=>1 )
		include('inc/connect.php');
		if (isset($_GET['id']) && filter_var($_GET['id'])) {
			$id = $_GET['id'];
			$query = "SELECT * FROM speaker where id_speaker = $id";
			$rersult = mysqli_query($mysqli,$query);
			$user= mysqli_fetch_array($rersult);


			if(isset($_POST['edit_khach'])){
				$name = $_POST['name'];
				$position = $_POST['position'];
				$company = $_POST['company'];
				$image = $_POST['image'];

				$query2 = "UPDATE speaker SET name='$name', position='$position',company='$company',image='$image' WHERE id_speaker = $id";
				$results = mysqli_query($mysqli,$query2);
				
				if ($results) {
					$message = '<div class="alert alert-success fade in">
		  									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 									<strong>Success!</strong>Cập nhật thành công.
											</div>';
				}
				else{
					$message = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Errors!</strong>Sửa không thành công.
					</div>';
				}
			}
		}


		?>
		<div class="panel panel-info">
			<div class="panel-heading"><h3>Sửa thông tin.</h3></div>
			<div class="panel-body">
				<form action="edit_khach.php?id=<?php echo $id; ?>" method="POST">
					<?php if (isset($message)) {
						echo $message;
					} ?>
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" name ="name" class="form-control" required placeholder="Tên" value="<?php echo $user['name']; ?>" >
					</div>

					<div class="form-group">
						<label for="">Vị trí</label>
						<input type="text" name ="position" class="form-control" required placeholder="Vị trí" value="<?php  echo $user['position']; ?>">
					</div>

					<div class="form-group">
						<label for="">Công ty</label>
						<input type="text" name ="company" class="form-control" required placeholder="Công ty" value="<?php  echo $user['company']; ?>">
					</div>

					<div class="form-group">
						<label for=""> Ảnh </label>
						<input type="text" name="image" class="form-control" required placeholder="Ảnh" value="<?php  echo $user['image']; ?>">
					</div>


				</div>
				<input type="submit" name="edit_khach" class=" btn btn-primary" value="Lưu lại">
			</form> 	
		</div>
		<div class="panel-footer"></div>
	</div>
</div>
</div>

<?php include ('includes/footer.php') ?>