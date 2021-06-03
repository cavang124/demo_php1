<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}
?>
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<div class="container">
    <h2 class="text-center page-header" style="color: #00cec9">QUẢN LÍ HỘI NGHỊ</h2>
    <div id="signupbox" style="display:block; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">

            <div class="panel-heading">
                <div class="panel-title">Đổi mật khẩu</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php"">Trang chủ</a></div>
            </div>  

            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" role="form" method="POST">
                    <?php
                    include('inc/connect.php');
                    $query3 =" SELECT * FROM user";
                    $rersult3 = mysqli_query($mysqli,$query3);
                    $user = mysqli_fetch_array($rersult3);
                    //$id = $_SESSION['id'];
                    $id = $_GET['id'];
                    if(isset($_POST['submit'])) {
                        $passw = ($_POST['password']);
                        $repassw = $_POST['repassw'];
                        $repassw2 = $_POST['repassw2'];
                       // echo $passw .$user['password']; die();
                        if ($passw == $_SESSION['password']) {
                         if ($repassw==$repassw2) {
                            $query = "UPDATE user SET password = $repassw Where id_user = $id";
                            $results = mysqli_query($mysqli,$query) ;
                            
                            if($results){
                                $message = '<div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> Đổi mật khẩu thành công.
                                </div>';
                            }else{
                             $message = '<div class="alert alert-danger fade in">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Noti!</strong> Đổi mật khẩu không thành công.
                             </div>';
                         }

                     }else{
                         $message = '<div class="alert alert-danger fade in">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Noti!</strong>Nhập lại dữ liệu.
                         </div>';
                     }
                 }else{
                    $message = '<div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Noti!</strong>Sai mật khẩu.
                    </div>';
                }

            }


            ?>    
            <?php if (isset($message)) {
                echo $message;
            } ?>          
            <div class="form-group">

                <label for="username" class="col-md-3 control-label  ">Tên đăng nhập</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="disabledInput" name="username"  disabled value="<?php echo $_SESSION['username'] ;  ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">Mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="repassw" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="passwd" class="col-md-3 control-label">Nhập lại Mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="repassw2" placeholder="">
                </div>
            </div>


            <div class="form-group" style="display: block;">
                <!-- Button -->                                        
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" name="submit" class="btn btn-success" value="Xác nhận" >   

                </div>
            </div>

        </form>
    </div>
</div>

</div> 
</div>
