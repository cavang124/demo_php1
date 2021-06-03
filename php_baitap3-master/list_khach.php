<?php
if(!isset($_SESSION)) 
    { 
        include('inc/check_session.php');
    }
	
	include('includes/header.php'); ?>
<?php $_SESSION['header'] = 'list_khach.php' ?>
<?php include('inc/connect.php'); ?>

 <div class="row">
    <div class="col-lg-12">
    	<h3 class="page-header"></h3>
    </div>
</div>

<div class="row">
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 ">
		<div class="panel panel-info">
  			<!-- Default panel contents -->
 		 	<div class="panel-heading"><h3>Danh sách khách tham gia</h3></div>
 			<div class="panel-body">
 				<table  class="table table-hover table-striped table-bordered table-responsive table-bordered" id="tb" >
					<thead>
						<tr>
							<th>ID</th>
							<th>Họ tên</th>
							<th>Vị trí</th>
							<th>Công ty</th>
							<th>Image</th>
						
						</tr>	
					</thead>

					<tbody>


						<?php 
							$query = "SELECT * FROM speaker";
							$rersult = mysqli_query($mysqli,$query) or die ("Query {$query} \n <br/> MYSQL errot:".mysql_error($dbc));
						//	var_dump($result);
							while ($user = mysqli_fetch_array($rersult)) {
						?>  

						<tr>
							<td><?php echo $user['id_speaker'] ?></td>
							<td><?php echo $user['name'] ?></td>
							<td><?php echo $user['position'] ?></td>
							<td><?php echo $user['company'] ?></td>
							<td><?php echo $user['image'] ?></td>
						
							<td><a href="edit_khach.php?id=<?php echo $user['id_speaker'] ?>" ><span class="glyphicon glyphicon-edit"></span></a></td>

							<td><a href="delete_khach.php?id=<?php echo $user['id_speaker'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>

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

<?php include('includes/footer.php') ;?>
