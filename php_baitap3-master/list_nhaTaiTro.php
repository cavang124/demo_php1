<?php
include('inc/check_session.php');
include('includes/header.php'); ?>
<?php include('inc/connect.php'); ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
	</div>

</div>

<div class="row">
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 ">
		<div class="panel panel-info">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Danh sách nhà tài trợ</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped table-bordered table-responsive " id="tb">
					<thead>
						<tr>
							<td>#</td>
							<th>Tên nhà tài trợ</th>
							<th>Thông tin liên hệ</th>
							<th>Số tiền tài trợ</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php

						$query = "SELECT * FROM donors";
						$rersult = mysqli_query($mysqli, $query);
						
						$index = 0;
						while ($nhaTaiTro = mysqli_fetch_array($rersult)) {
							$index++;
						?>

							<tr>
								<td><?php echo $index; ?></td>
								<td><?php echo $nhaTaiTro['name']; ?></td>
								<td>
									<p><?php echo $nhaTaiTro['email']; ?></p>
									<p><?php echo $nhaTaiTro['address']; ?></p>
								</td>
								<td>
									<?php echo number_format($nhaTaiTro['money']); ?>
								</td>
								<td><a href="edit_nhaTaiTro.php?id=<?php echo $nhaTaiTro['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>

								<td><a href="delete_nhaTaiTro.php?id=<?php echo $nhaTaiTro['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>


							</tr>
						<?php
						}
						?>
					</tbody>

				</table>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>

<?php include('includes/footer.php'); ?>