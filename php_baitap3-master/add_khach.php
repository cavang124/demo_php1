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
		if (isset($_POST['add_khach'])) {

			$errors = array();

			if (empty($_POST['name'])) {
				$errors = 'name';
			} else {
				$name = $_POST['name'];
			}

			if (empty($_POST['position'])) {
				$errors = 'position';
			} else {
				$position = $_POST['position'];
			}

			if (empty($_POST['company'])) {
				$errors = 'company';
			} else {
				$company = $_POST['company'];
			}

			if (empty($_POST['image'])) {
				$errors = 'image';
			} else {
				$image = $_POST['image'];
			}

			if (empty($errors)) {
				$query = "INSERT INTO speaker(name,position,company,image) VALUES ('{$name}','{$position}','{$company}','{$image}'); ";
				$results = mysqli_query($mysqli, $query);
				
				if ($results) {
					$message = '<div class="alert alert-success fade in">
		  									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 									<strong>Success!</strong>Thêm mới thành công.
											</div>';
					$name = '';
					$position = '';
					$company = '';
					$image = '';
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
				<h3>Thêm người đại diện</h3>
			</div>
			<div class="panel-body">
				<form action="add_khach.php" method="POST" >
					<?php if (isset($message)) {
						echo $message;
					} ?>
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" name="name" class="form-control" placeholder="Tên" value="<?php if (isset($name)) echo $name ?>">
					</div>

					<div class="form-group">
						<label for="">Vị trí</label>
						<input type="text" name="position" class="form-control" placeholder="Vị trí" value="<?php if (isset($position)) echo $position ?>">
					</div>

					<div class="form-group">
						<label for="">Công ty</label>
						<input type="text" name="company" class="form-control" placeholder="Công ty" value="<?php if (isset($company)) echo $company ?>">
					</div>

					<div class="form-group">
						<label for="">Ghi chú </label>
						<input type="text" name="image" class="form-control" placeholder="Ảnh" value="<?php if (isset($image)) echo $image ?>">
					</div>

					<input type="submit" name="add_khach" class=" btn btn-primary" value="Thêm mới">
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>


	</div>
</div>

<?php include('includes/footer.php') ?>