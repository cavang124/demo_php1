<?php
    include('inc/check_session.php');
    include('includes/header.php');
?>
<?php
	include('inc/connect.php'); 
	$query1 =" SELECT id FROM topic";
	$rersult1 = mysqli_query($mysqli,$query1);
	$query2 = "SELECT id FROM topic ";
	$rersult2 = mysqli_query($mysqli,$query2);
	$row1= mysqli_fetch_array($rersult1);
	$row2 = mysqli_fetch_array($rersult2);
	$query3 =" SELECT * FROM speaker";
	$rersult3 = mysqli_query($mysqli,$query3);
	$user = mysqli_fetch_array($rersult3);
    
?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header panel-info">
            <h3 style="color: red">Xin chào! <?php if(isset($_SESSION['name'])) echo $_SESSION['name'];  ?></h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo "{$row1['id']}" ?></div>
                        <div>Khách tham dự</div>
                    </div>
                </div>
            </div>
            <a href="list_khach.php">
                <div class="panel-footer">
                    <span class="pull-left">Danh sách khách tham dự</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa  fa-laptop fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo "{$row2['id']}" ?></div>
                        <div>Nhà tài trợ</div>
                    </div>
                </div>
            </div>
            <a href="list_nhaTaiTro.php">
                <div class="panel-footer">
                    <span class="pull-left">Danh sách nhà tài trợ</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
			
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Danh sách khách tham gia sự kiện trong tháng <?php echo date('m'); ?></h4></div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover table-bordered " id="tb" >
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Vị trí</th>
                            <th>Công ty</th>
                            <th>Image</th>
                          
                        </tr>
                    </thead> 
                    <tbody>
                        
                        <tr>
                            <td><?php echo $user['id_speaker'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                      
                            <td><?php echo $user['position'] ?></td>
                            <td><?php echo $user['company'] ?></td>
                            <td><?php echo $user['image'] ?></td>
                        </tr>
                            
                    </tbody> 
                    
                </table>   

            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
    
            
        
    </div>
</div>
<?php include('includes/footer.php'); ?>