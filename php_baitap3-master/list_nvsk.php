<?php 
include ('inc/check_session.php');
include ('includes/header.php'); ?>
<?php $_SESSION['header'] = 'list_nvsk.php' ?>
 <div >
    <div class="panel panel-info">
        <h3 class="panel-heading">Thống kê</h3>
    </div>
</div>
<div class="row">
	<div class="col-lg-6 ">
		<div class="panel panel-info">
			<!-- <div class="panel-heading"></div> -->
			<div class="panel-body">
				<form action="" method="GET" class="">
					<div class="form-group" >
						<label for="">Sự kiện</label>
						<select class ="form-control" name="phongban" id="" >
							<?php
								require 'inc/connect.php';
								$query = "SELECT company FROM speaker ";
								$rersult1 = mysqli_query($mysqli,$query1) ;
								while ($phongban = mysqli_fetch_array($rersult,MYSQLI_ASSOC)){
							?>
							<option value="<?php  echo $phongban['company']; ?>"><?php echo $phongban['company']; ?></option>
							<?php } ?>
						</select>
					</div>
					<input type="submit" name="submit" class=" btn btn-info" value="Xác Nhận">
				</form>
			</div>
			<!-- <div class="panel-footer"></div> -->
		</div>
	</div>
</div>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'GET'&& !empty($_GET['phongban'])){
	$phongB = $_GET['phongban'];
	$query1 = "SELECT * FROM speaker WHERE position = '{$phongB}'";
	$rersult1 = mysqli_query($dbc,$query1);
	$row = mysqli_num_rows($rersult1);
	
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading"><h3><?php echo $phongB; ?></h3></div>
			<div class="panel-body">
				<table class="table table-responsive table-striped table-hover table-bordered " id="tb">
					<thead>
						<tr>
							<th>ID</th>
							<th>Họ tên</th>
							<th></th>
							<th>Địa chỉ</th>
							<th>Số điện thoại</th>
							<th>Ngày Sinh</th>
							
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php while ($nhanvien = mysqli_fetch_array($rersult1,MYSQLI_ASSOC)) { ?>
							<td><?php echo $nhanvien['id_speaker'] ?></td>
							<td><?php echo $nhanvien['name'] ?></td>
							
							</td>
							<td><?php echo $nhanvien['position'] ?></td>
							<td><?php echo $nhanvien['company'] ?></td>
							<td><?php echo $nhanvien['image'] ?></td>
							<!-- <td><?php //echo $nhanvien['department'] ?></td> -->
							
							<td><a href="edit_khach.php?id=<?php echo $user['id_speaker'] ?>" ><span class="glyphicon glyphicon-edit"></span></a></td>

							<td><a href="delete_khach.php?id=<?php echo $user['id_speaker'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer"><?php echo 'Tổng số: '.$row; ?></div>
		</div>

	</div>
</div>
<?php } ?>
<?php include 'includes/footer.php'; ?>