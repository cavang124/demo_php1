<?php
    session_start();
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
    
<div class="container">
    <h2 class="text-center page-header" style="color: #00cec9">ĐĂNG KÝ TÀI KHOẢN</h2>
     <div id="signupbox" style="display:block; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">

                        <div class="panel-heading">
                            <div class="panel-title">Đăng ký</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php"">Đăng nhập</a></div>
                        </div>  

                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" method="POST">
                            <?php
                                include('inc/connect.php');
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $errors = array();
                                    if (empty($_POST['name'])) {
                                        $errors[] = 'name';
                                    }
                                    else{
                                        $name = $_POST['name'];
                                    }

                                    if (empty($_POST['position'])) {
                                         $errors[] = 'position';
                                    }
                                    else{
                                        $position = $_POST['position'];
                                    }

                                    if (empty($_POST['company'])) {
                                        $errors[] = 'company';
                                    }
                                    else{
                                         $company = $_POST['company'];
                                    }

                                    if (empty($_POST['image'])) {
                                         $errors[] = 'image';
                                    }
                                    else{
                                        $password = $_POST['image'];
                                    }
                                   
                                    if(empty($errors)){
                                        $query = "INSERT INTO users( name, position,company, image) VALUES('{$username}','{$position}','{$company}','{$image}')";
                                        $results = mysqli_query($dbc,$query) or die( "Query {$query} \n <br/> MYSQL error: ".mysqli_error());
                                        
                                        if($results){
                                            $message = '<div style = "color : green;">Đăng kí thành công!</div>';
                                        }
                                    }
                                    else{
                                        $message = '<div style="color:red ">Vui lòng điền đầy đủ các thông tin!</div>';
                                    }
                                    
                                } 
                            ?>              
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Họ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Tên</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Tên đăng nhập</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passwd" class="col-md-3 control-label">Nhập lại Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" placeholder="">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group" style="display: block;">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" name="btn-submit" class="btn btn-success" value="Đăng kí" >   
                                        <?php if (isset($message)) {
                                            echo $message;
                                        } ?>
                                    </div>
                                </div>
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
</div>
 