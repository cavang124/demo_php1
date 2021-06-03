<?php
include('inc/check_session.php');
include('includes/header.php'); ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header "></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-1 col-xs-12 col-sm-12">
		<?php
		include('inc/connect.php');
		if (isset($_POST['add_nhaTaiTro'])) {

			$errors = array();

			if (empty($_POST['name'])) {
				$errors = 'name';
			} else {
				$name = $_POST['name'];
			}

			if (empty($_POST['address'])) {
				$errors = 'address';
			} else {
				$address = $_POST['address'];
			}

			if (empty($_POST['email'])) {
				$errors = 'email';
			} else {
				$email = $_POST['email'];
			}

			if (empty($_POST['money'])) {
				$errors = 'money';
			} else {
				$money = $_POST['money'];
			}

			if (empty($errors)) {
				$query = "INSERT INTO donors (name,address, email ,money) VALUES ('{$name}','{$address}','{$email}','{$money}'); ";
				$results = mysqli_query($mysqli, $query);
				
				if ($results) {
					$message = '<div class="alert alert-success fade in">
		  									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 									<strong>Success!</strong>Thêm mới thành công.
											</div>';
					$name = '';
					$address = '';
					$email = '';
					$money = '';
				} else {
					$message = '<div class="alert alert-danger fade in">
		  									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 									<strong>Errors!</strong>Thêm mới không thành công.
											</div>';
				}
			} else {
				$message = '<div class="alert alert-warning fade in">
		  								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 									<strong>Warning!</strong>Vui lòng điền đầy đủ các thông tin.
										</div>';
			}
		}

		?>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3>Thêm nhà tài trợ</h3>
			</div>
			<div class="panel-body">
				<form action="add_nhaTaiTro.php" method="POST" >
					<?php if (isset($message)) {
						echo $message;
					} ?>
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" name="name" class="form-control" placeholder="Tên" value="<?php if (isset($name)) echo $name ?>">
					</div>

					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?php if (isset($address)) echo $address ?>">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="<?php if (isset($email)) echo $email ?>">
					</div>

					<div class="form-group">
						<label for="">Số tiền tài trợ:</label>
						<input type="number" name="money" class="form-control" placeholder="Số tiền tài trợ" value="<?php if (isset($money)) echo $money ?>">
					</div>

					<input type="submit" name="add_nhaTaiTro" class=" btn btn-primary" value="Thêm mới">
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>


	</div>
</div>

<?php include('includes/footer.php') ?>