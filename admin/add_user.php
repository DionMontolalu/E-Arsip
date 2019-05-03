<?php  
session_start();  
  
if(!$_SESSION['username']) {    
 header("Location: http://localhost/e-arsip/login.php");//redirect to login page to secure the welcome page without login access.  
}   
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
    <link href="datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Sweet Alert -->
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .peringatan {
            padding: 20px;
            background-color: #E53935;
            color: white;
            margin-bottom: 15px;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
        }

        .closebtn:hover {
            color: black;
        }
        
        #panel, #flip {
            padding: 5px;
            text-align: left;
            background-color: #FAFAFA;
            border: solid 2px #c3c3c3;
        }

        #panel {
            padding: 10px;
            display: none;
        }
    </style>
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
                                <div><?php echo $_SESSION['username']; ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <?php
                    if($_SESSION['level'] == "super"){
                    echo '<li>
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
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Manajemen User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="selected">
                                <a href="add_user.php">Tambah Data User</a>
                            </li>
                            <li>
                                <a href="view_user.php">Lihat Data User</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>';        
                    }else if($_SESSION['level'] == "user"){
                    echo '<li>
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
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!--end page header -->
            </div>
            
 <?php
    include "kjn.php";
    error_reporting(0);
    //proses input data
    $username = addslashes (strip_tags ($_POST['username']));
    $password = addslashes (strip_tags ($_POST['password']));
    $level = addslashes (strip_tags ($_POST['level']));
    
    if (isset($_POST['input'])) {
        if ($username == "") {
           echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Username tidak diisi, </strong> username tidak boleh kosong !!
                  </div>";
        }else if($password==""){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Password tidak diisi, </strong> password tidak boleh kosong !!
                  </div>";
        }
        else{
           //insert ke tabel
           $query = "INSERT INTO user VALUES('','$username','$password','$level')";
           $sql = mysqli_query ($conn,$query);
                if ($sql){
                    echo '<script>
                        swal({
                            title: "Berhasil",
                            text: "Data berhasil ditambahkan!",
                            type: "success",
                        },
                        function(){
                            window.location.href = "view_user.php";
                        });
                        </script>';
                }elseif (!$sql){
                    echo '<script>swal("Kesalahan!", "Terjadi Kesalahan pada pengisian data , coba lagi!", "warning")</script>';
                                    }
        }
    }
 ?>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data User
                        </div>
                        <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="usr">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <label for="usr">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <input type="hidden" name="level" value="user"></input>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="input" class="btn btn-success btn-md pull-right"><b style="color:white;"><span class="fa fa fa-floppy-o" aria-hidden="true"></span> Simpan</b></button>
                            </form>
                        </div>
                    </div>
                     <!-- End Form Elements -->
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
</body>

</html>
