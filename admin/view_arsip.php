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
    <script type="text/javascript">
    function popup_print(id_terdakwa){
        window.open("e-arsip.php?id_terdakwa="+id_terdakwa,"page","toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes")
    }
    </script>
    <link rel="icon" type="image/png" href="icon.png">
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="sweetalert/dist/sweetalert.min.js"></script>

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
                    <li class="active">
                        <a href="#"><i class="fa fa-table fa-fw"></i> Kearsipan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_arsip.php">Tambah Data</a>
                            </li>
                            <li class="selected">
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
                    echo '<li>
                        <a href="home.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-table fa-fw"></i> Kearsipan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_arsip.php">Tambah Data</a>
                            </li>
                            <li class="selected">
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
        <?php
        include "kjn.php";
         if(isset($_GET['hapus'])){
            $id_terdakwa = $_GET['id_terdakwa'];
            $cek = mysqli_query($conn,"SELECT * FROM koderak
            INNER JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
            INNER JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa WHERE id_terdakwa='$id_terdakwa'");
             
              if(mysqli_num_rows($cek) == 0){
                echo "<script>
                        swal({
                          title: 'Gagal Disimpan',
                          text: 'Data tidak ditemukan!',
                          type: 'warning',
                        },
                        function(){
                          window.location.href = 'Data-berita';
                        });
                      </script>";
              }else{
               while($row = mysqli_fetch_assoc($cek))
                $id_rak  = $row['id_rak'];
                $id_saksi  = $row['id_saksi'];

               $terdakwa = mysqli_query($conn,"DELETE FROM terdakwa WHERE id_terdakwa='$id_terdakwa'");
               $barcode = mysqli_query($conn,"DELETE FROM koderak WHERE id_rak='$id_rak'");
               $saksi = mysqli_query($conn,"DELETE FROM saksi WHERE id_saksi='$id_saksi'");
                
                if(($terdakwa)and($barcode)and($saksi)){
                    echo "<script>swal('Terhapus!', 'Data berhasil dihapus!', 'success')</script>";
                }else{
                    echo "<script>swal('Tidak Terhapus!', 'Berita gagal dihapus!', 'warning')</script>";
                }
              }
        }
        ?>
            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">View Data Arsip</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Terdakwa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Rak</th>
                                            <th>Nomor Perkara</th>
                                            <th>Nomor Putusan</th>
                                            <th>Nama Terdakwa</th>
                                            <th>&n2lbr</th>
                                            <th>Putusan PN</th>
                                            <th>Putusan PT</th>
                                            <th>Putusan MA</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php
             include "kjn.php";
             error_reporting(0);
                $sql = "SELECT terdakwa.id_terdakwa, koderak.koderak, terdakwa.noper, terdakwa.noput, terdakwa.nama, terdakwa.umur, terdakwa.jk, terdakwa.u_pn, terdakwa.u_pt, terdakwa.u_ma
                FROM koderak
                JOIN terdakwa 
                ON koderak.id_terdakwa = terdakwa.id_terdakwa;";
             $result = mysqli_query($conn, $sql);
                        
              if (mysqli_num_rows($result) > 0) {
               $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                 echo '<tr class="odd gradeX">';
                    echo "<td><center>$no</center></td>";
                    echo "<td><center>".$row['koderak']."</center></td>";
                    echo "<td><center>".$row['noper']."</center></td>";
                    echo "<td><center>".$row['noput']."</center></td>";
                    echo "<td><center>".$row['nama']."</center></td>";
                    echo "<td><center>".$row['umur']."</center></td>";
                     if($row['u_pn']===NULL){
                        echo "<td><center>Belum Upload</center></td>";
                     }else{ 
                        echo "<td><center>Sudah Upload</center></td>"; 
                     } 
                    
                     if($row['u_pt']===NULL){
                        echo "<td><center>Belum Upload</center></td>";
                     }else{ 
                        echo "<td><center>Sudah Upload</center></td>"; 
                     }
                     
                     if($row['u_ma']===NULL){
                        echo "<td><center>Belum Upload</center></td>";
                     }else{ 
                        echo "<td><center>Sudah Upload</center></td>"; 
                     }
                        echo "<td><center>
                        <a href=terdakwa_view.php?id_terdakwa=$row[id_terdakwa]><span class='label label-warning'>View</span> </a>

                        <a href=add_perkara.php?id_terdakwa=$row[id_terdakwa]><span class='label label-info'>Add Perkara</span></a>

                        <a href=# onClick=\"popup_print($row[id_terdakwa])\"><span class='label label-success'>Print Data</span>
                        </a>
                            
                        </td>";
                                            $no++;
                                            }
                                        }else {
                                            echo "0 results";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
 
 <!--<a href=view_arsip.php?hapus&id_terdakwa=$row[id_terdakwa] class=\"delete-link\"><span class='label label-danger' type=\"hidden\">Delete</span> </a></center>-->
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
        var getLink = $(this).attr('href');
            swal({
                title: 'Hapus data ini ?',
                text: 'Cek kembali , sebelum menghapus data ini !!',
                type: 'warning',
                html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
            },function(){
                window.location.href = getLink
            });
            return false;
            });
        }); 
    </script>

</body>
</html>
