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
			$query = "SELECT * FROM donors where id = $id";
			$rersult = mysqli_query($mysqli,$query);
			$donor= mysqli_fetch_array($rersult);


			if(isset($_POST['edit_nhaTaiTro'])){
				$name = $_POST['name'];
				$address = $_POST['address'];
				$email = $_POST['email'];
				$money = $_POST['money'];

				$query2 = "UPDATE donors SET name='$name', address='$address',email='$email',money='$money' WHERE id = $id";
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
				<form action="edit_nhaTaiTro.php?id=<?php echo $id; ?>" method="POST">
					<?php if (isset($message)) {
						echo $message;
					} ?>
					<div class="form-group">
						<label for="">Tên nhà tài trợ</label>
						<input type="text" name ="name" class="form-control" required placeholder="Tên" value="<?php echo $donor['name']; ?>" >
					</div>

					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" name ="address" class="form-control" required placeholder="Địa chỉ" value="<?php  echo $donor['address']; ?>">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name ="email" class="form-control" required placeholder="Email" value="<?php  echo $donor['email']; ?>">
					</div>

					<div class="form-group">
						<label for="">Số tiền tài trợ </label>
						<input type="number" name="money" class="form-control" required placeholder="money" value="<?php  echo $donor['money']; ?>">
					</div>


				</div>
				<input type="submit" name="edit_nhaTaiTro" class=" btn btn-primary" value="Lưu lại">
			</form> 	
		</div>
		<div class="panel-footer"></div>
	</div>
</div>
</div>

<?php include ('includes/footer.php') ?>