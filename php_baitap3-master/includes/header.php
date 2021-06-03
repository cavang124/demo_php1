<?php
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("a.jpg");

    /* Full height */
    height: 50%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý hội nghị</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
    <div class="bg"></div>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand text-center" href="index.php" style="font-size: 30px; color:blue"> <strong>QUẢN LÝ HỘI NGHỊ</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Hồ sơ</a>
                        </li>
                        <li><a href="pass_chance.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-gear fa-fw"></i>Đổi mật khẩu</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
         <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- SEACH-->
                     <!--    <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                           
                        </li> -->
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i>Trang chủ</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Danh sách <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="list_khach.php"><i class="fa fa-user fa-fw"></i> Khách tham dự</a>
                                </li>
                                <li>
                                    <a href="list_nhaTaiTro.php"><i class="fa fa-laptop fa-fw"></i> Nhà tài trợ</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Thêm mới +  <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_khach.php"><i class="fa fa-user fa-fw"></i> Khách tham dự</a>
                                </li>
                                <li>
                                    <a href="add_nhaTaiTro.php"><i class="fa fa-laptop fa-fw"></i> Nhà tài trợ</a>
                                </li>
                            </ul>
                        </li>
                         <li>
                            <a href="list_nvsk.php"><i class="fa fa-bar-chart-o fa-fw"></i>Thống kê theo sự kiện</span></a>
                        </li>
                       <!--  <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>DMM<span class="fa arrow"></span></a>
                        </li> -->
                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
         <div id="page-wrapper">