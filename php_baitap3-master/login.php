<?php session_start(); ?>

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
<!------ Include the above in your HEAD tag ---------->
<h1 class="text-center page-header" style="color: #00cec9">QUẢN LÍ HỘI NGHỊ</h1>
<?php
	require_once('inc/connect.php') ;
	if(isset($_POST["btn-submit"])){
		//lấy thông tin đăng nhập
		$username = $_POST["username"]; //tên sử dụng database
        $password = $_POST["password"]; //
        $input = $_POST["input"]; //lấy mã captcha người dùng nhập vào
		//lọc thông tin, xóa các tag html, kí tự đặc biệt
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password ==""){
			$message = '<div class="alert alert-danger" role="alert">Không để trống tên đăng nhập, mật khẩu hay captcha!</div>';
		} //không được để trống thông tin đăng nhập hay ô captcha
		else{
            if(1 == 1){//nếu như mã captcha nhập đúng thì kiểm tra username và password
			$query = "select * from user where username = '$username' and password = '$password' ";
			var_dump($query);
			$result = $mysqli->query($query);
			$ss = $result->fetch_array(MYSQLI_NUM);
            // echo "<pre>";
            // print_r($ss);
            // echo "</pre>"; die();
			var_dump($ss);
			if ($ss==0) {
				$message = '<div class="alert alert-danger" role="alert">Tên đăng nhập hoặc mật khẩu không đúng!</div>';
			}
			else{
				
				$id = $ss[0];
                $_SESSION['role'] = $ss[1];
                $_SESSION['name'] = $ss[2];
				$_SESSION['id'] = $ss[0];
                $_SESSION['address'] = $ss[3];
				$_SESSION['username'] = $ss[4];
                $_SESSION['password'] = $ss[5];
				$_SESSION['image'] = $ss[7];
				$_SESSION['email'] = $ss[6];
				$_SESSION['phone'] = $ss[8];

				header('Location: index.php');
			}
        }
        else $message = '<div class="alert alert-danger" role="alert">Mã captcha không hợp lệ!</div>'; //nhập sai mã captcha
    }
}
?>

    <style type="text/css"> 
            <body>
        background-image:url('a.jpeg')
        form{ <!-- Form captcha  -->
        width: 450px;
        margin: 20px auto;
        border: 1px solid #95a5a6;
        border-radius: 5px;
        background: #fff;
        padding: 20px;
    }
    form input[type="text"]{
        width: 200px;
        height: 48px;
        padding: 0;
        margin: 0;
        float: left;
        border: 1px solid #2c3e50;
        margin-right: 10px;
        border-radius: 5px;
    }
	</style>
    </body>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Đăng nhập</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#"> Quên mật khẩu?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <!--FORM STAR-->
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Tên đăng nhập">                                        
                                    </div>
                                
                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                    </div> 
                                    
                                    <div>
                                    <p>Nhập mã captcha:</p>
                                    <input type="text" name="input"><img src="captcha.php" title="" alt="" /><br />                                        
                                    </div> <!--Tạo ô nhập captcha và ảnh captcha -->

                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Duy trì đăng nhập
                                        </label>
                                      </div>
                                    </div>

                            <?php 
                            if (isset($message)) {
									echo $message;
							}
							?>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="btn-submit" class="btn btn-success" value="Đăng nhập">	
                                  
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Bạn chưa có tài khoản?
                                        <a href="signup.php" >
                                            Đăng kí
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>
    