<?php  
session_start();  
  
if(!$_SESSION['username']) {    
 header("Location: http://localhost/e-arsip/login.php");//redirect to login page to secure the welcome page without login access.  
}
include "kjn.php";   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Arsip Kejaksaan</title>
    <meta name="author" content="Dion Montolalu" />
    <link rel="icon" type="image/png" href="icon.png"> 
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="admin.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                    <?php
                      if($_SESSION['level'] == "super"){
                        echo '<li><a href="view_admin.php"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>';
                      }else if ($_SESSION['level'] == "user") {
                        echo '<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>';
                      }
                    ?>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $_SESSION['username']; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <?php
                    if($_SESSION['level'] == "super"){
                    echo '<li class="selected">
                        <a href="home.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Kearsipan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_arsip.php">Tambah Data</a>
                            </li>
                            <li>
                                <a href="view_arsip.php">Lihat Data Arsip</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Manajemen User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_user.php">Tambah Data User</a>
                            </li>
                            <li>
                                <a href="view_user.php">Lihat Data User</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>';        
                    }else if($_SESSION['level'] == "user"){
                    echo '<li class="selected">
                        <a href="home.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Kearsipan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_arsip.php">Tambah Data</a>
                            </li>
                            <li>
                                <a href="view_arsip.php">Lihat Data Arsip</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>';
                    }
                    ?>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-user"></i><b>&nbsp;Hello </b><?php echo $_SESSION['username']; ?> </b> 
                        <i class="fa fa-calendar pull-right">&nbsp;<b align="right">
                        <?php 
                            echo "Hari ini " . date("d/m/Y") . "<br>"; 
                        ?></b> </i>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3>
                <?php
                    $sql = "SELECT COUNT(nama) AS NAMA FROM koderak
                            JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                            JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa";
                    $a = mysqli_query($conn,$sql);
                    $jumlah = mysqli_fetch_array($a);
                        echo $jumlah['NAMA'];
                ?>
                            </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Jumlah Terdakwa
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-mars fa-3x"></i>
                            <h3>
                <?php
                    $sql = "SELECT COUNT(jk) AS JK FROM koderak
                            JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                            JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa WHERE jk='Laki-laki'";
                    $a = mysqli_query($conn,$sql);
                    $jumlah = mysqli_fetch_array($a);
                        echo $jumlah['JK'];
                ?>
                            </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Jumlah Terdakwa Laki-laki
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa-venus fa-3x"></i>
                            <h3>
                <?php
                    $sql = "SELECT COUNT(jk) AS JK FROM koderak
                            JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                            JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa WHERE jk='Perempuan'";
                    $a = mysqli_query($conn,$sql);
                    $jumlah = mysqli_fetch_array($a);
                        echo $jumlah['JK'];
                ?>
                            </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Jumlah Terdakwa Perempuan
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa-users fa-3x"></i>
                            <h3>
                <?php
                    $sql = "SELECT COUNT(id_user) AS USERS FROM user WHERE LEVEL !='super'";
                    $a = mysqli_query($conn,$sql);
                    $jumlah = mysqli_fetch_array($a);
                        echo $jumlah['USERS'];
                ?>
                            </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Jumlah User
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
