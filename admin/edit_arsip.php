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
    <!-- plugin editor -->
    <script src="tinymce/tinymce.min.js"></script>
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
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                <?php
                    error_reporting(0);
                    include "kjn.php";
                    $id_terdakwa = $_GET['id_terdakwa'];
                    $show = mysqli_query($conn,"SELECT * FROM koderak
                        JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                        JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa
                        WHERE terdakwa.id_terdakwa='$id_terdakwa'");
                        
                        if(mysqli_num_rows($show) == 0){
                            echo '<script>window.history.back()</script>';
                        }else{
                            $row = mysqli_fetch_array($show);
                            $id_terdakwa    = $row['id_terdakwa'];
                            $id_saksi       = $row['id_saksi'];
                            $id_rak         = $row['id_rak'];
                            $koderak        = $row['koderak'];     
                        }
                ?>
                    <h1 class="page-header">Edit Data Terdakwa</h1>
                </div>
                <!--end page header -->
            </div>
            
 <?php
    include "kjn.php";
    error_reporting(0);
    //proses input data
    $noper = addslashes (strip_tags ($_POST['noper']));
    $noput = addslashes (strip_tags ($_POST['noput']));
    $nama = addslashes (strip_tags ($_POST['nama']));
    $umur = addslashes (strip_tags ($_POST['umur']));
    $tempat = addslashes (strip_tags ($_POST['tempat']));
    $ttl = addslashes (strip_tags ($_POST['ttl']));
    $jk = addslashes (strip_tags ($_POST['jk']));
    $kebangsaan = addslashes (strip_tags ($_POST['kebangsaan']));
    $tempating = addslashes (strip_tags ($_POST['tempating']));
    $agama = addslashes (strip_tags ($_POST['agama']));
    $pekerjaan = addslashes (strip_tags ($_POST['pekerjaan']));
    $saksi = addslashes (strip_tags ($_POST['saksi']));

    if (isset($_POST['input'])) {
        if($nama==""){
           echo "<div class=\"peringatan\">
                 <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Nama </strong> tidak boleh kosong !!
                </div>";
                        
        }else if($noput==""){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                        <strong> Nomor Putusan </strong> tidak boleh kosong !!
                    </div>";
        }else if($noper==""){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                        <strong> Nomor Perkara </strong> tidak boleh kosong !!
                    </div>";
        }else{
            
            $query = "UPDATE terdakwa SET noper='$noper',noput='$noput',nama='$nama',umur='$umur',tempat='$tempat',ttl='$ttl',jk='$jk',kebangsaan='$kebangsaan',tempating='$tempating',agama='$agama',pekerjaan='$pekerjaan' WHERE id_terdakwa='$id_terdakwa'";
                $sql = mysqli_query ($conn,$query);
                  
            $kj = 12;
            $inil = substr($nama,0,2);
            $inil = strtolower($inil);
            $kodrak = $kj.$inil.$id_terdakwa;

            $barcode = "UPDATE koderak SET koderak='$kodrak' WHERE id_rak='$id_rak'";
            $sql2 = mysqli_query ($conn,$barcode);

            $saksi = "UPDATE saksi SET saksi_saksi='$saksi' WHERE id_saksi='$id_saksi'";
            $sql3 = mysqli_query ($conn,$saksi);

            if (($sql)and($sql2)and($sql3)) {
                echo '<script>
                        swal({
                            title:"Berhasil",
                            text: "Data berhasil diperbarui!",
                            type: "success",
                        },
                      function(){
                        window.location.href = "view_arsip.php";
                      });
                    </script>';
            }else{
                echo '<script>swal("Gagal!", "Ada kesalahan pemasukan data!", "warning")</script>';
            }
        } 
    }
 ?>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Kearsipan
                        </div>
                        <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="usr">Kode Rak</label>
                                        <input type="text" name="kodrak" class="form-control" placeholder="Kode Rak Terdakwa" value="<?php echo $row['koderak']; ?>" readonly>
                                    </div>
                                    
                                    <div class="container-fluid">
                                        <div class="col-md-6">
                                         <div class="form-group">
                                          <label for="usr">Nomor Perkara</label>
                                          <input type="text" name="noper" class="form-control" placeholder="Nomor Perkara Terdakwa" value="<?php echo $row['noper']; ?>">
                                         </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="usr">Nomor Putusan</label>
                                            <input type="text" name="noput" class="form-control" placeholder="Nomor Putusan Terdakwa" value="<?php echo $row['noput']; ?>">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">Nama Terdakwa</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Terdakwa" value="<?php echo $row['nama']; ?>">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="usr">Umur</label>
                                            <input type="text" name="umur" class="form-control" placeholder="Umur" value="<?php echo $row['umur']; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                         <div class="form-group">
                                           <label>Tempat Lahir</label>
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" autocomplete="off" value="<?php echo $row['tempat']; ?>">
                                         </div>
                                        </div>
                                      <div class="col-md-5">
                                        <label>Tanggal Lahir</label>
                                          <div class='input-group date' id='datepicker'>
                                            <input type='text' name="ttl" class="form-control" placeholder="Tanggal Bulan Tahun Lahir" value="<?php echo $row['ttl']; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                          </div>
                                      </div>    
                                    </div>
                                    
                                    
                                    <div class="row">
                                      <div class="col-md-5">
                                        <div class="form-group">
                                          <label>Jenis Kelamin</label>
                                           <select name="jk" class="form-control" id="sel1">
                                            <option value="Laki-laki" <?php if($row['jk'] == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if($row['jk'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
                                           </select>
                                        </div>
                                      </div>
                                      <div class="col-md-7"></div>
                                    </div>

                                    <div class="form-group">
                                    <label>Kebangsaan</label>
                                      <input type="text" name="kebangsaan" class="form-control" placeholder="Kebangsaan Terdakwa" autocomplete="off" value="<?php echo $row['kebangsaan']; ?>">
                                    </div>

                                    <div class="form-group">
                                    <label>Tempat Tinggal</label>
                                      <input type="text" name="tempating" class="form-control" placeholder="Tempat Tinggal" autocomplete="off" value="<?php echo $row['tempating']; ?>">
                                    </div>

                                    <div class="row">
                                      <div class="col-md-5">
                                        <div class="form-group">
                                          <label>Agama</label>
                                           <select name="agama" class="form-control" id="sel1">
                                            <option value="Kristen Katolik" <?php if($row['agama'] == 'Kristen Katolik'){ echo 'selected'; } ?>>Kristen Katolik</option>
                                            <option value="Kristen" <?php if($row['agama'] == 'Kristen'){ echo 'selected'; } ?>>Kristen</option>
                                            <option value="Islam" <?php if($row['agama'] == 'Islam'){ echo 'selected'; } ?>>Islam</option>
                                            <option value="Hindu" <?php if($row['agama'] == 'Hindu'){ echo 'selected'; } ?>>Hindu</option>
                                            <option value="Budha" <?php if($row['agama'] == 'Budha'){ echo 'selected'; } ?>>Budha</option>
                                            <option value="Konghucu" <?php if($row['agama'] == 'Konghucu'){ echo 'selected'; } ?>>Konghucu</option>
                                           </select>
                                        </div>
                                      </div>
                                      <div class="col-md-7"></div>
                                    </div>

                                    <div class="form-group">
                                    <label>Pekerjaan</label>
                                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" autocomplete="off" value="<?php echo $row['pekerjaan']; ?>">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group"> <label for="exampleInputFile">Upload File Putusan PN</label> <br>
                        <?php 
                            if($row['u_pn']===NULL){
                                echo "<center>Belum Upload</center>";
                            }else{ 
                                echo "<i>Terupload</i> <a href=\"pdf/web/viewer.html?file=upload/PT/$upn\" target=\"_blank\"><b style=\"color:#00b33c;\">Lihat Data</b></a>"; 
                            } 
                        ?>
                                          </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                         <div class="form-group"> <label for="exampleInputFile">Upload File Putusan PT</label> <br>
                        <?php 
                            if($row['u_pt']===NULL){
                                echo "<center>Belum Upload</center>";
                            }else{ 
                                echo "<i>Terupload</i> <a href=\"pdf/web/viewer.html?file=upload/PT/$upt\" target=\"_blank\"><b style=\"color:#00b33c;\">Lihat Data</b></a>"; 
                            } 
                        ?>
                                          </div>   
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"> <label for="exampleInputFile">Upload File Putusan MA</label> <br>
                        <?php 
                            if($row['u_ma']===NULL){
                                echo "<center>Belum Upload</center>";
                            }else{ 
                                echo "<i>Terupload</i> <a href=\"pdf/web/viewer.html?file=upload/PT/$uma\" target=\"_blank\"><b style=\"color:#00b33c;\">Lihat Data</b></a>"; 
                            } 
                        ?>
                                          </div>
                                        </div>
                                <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Barcode Rak</label><br>        
                                <?php
                                    echo "<img alt=\"testing\" src=\"barcode.php?text=$koderak&print=true\"/>";
                                ?>  
                                  </div>
                                </div>
                                    </div>
                                    <!-- Jquery Slide-->
                                <div id="flip"> <h5><b class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></b><b>Saksi - saksi : Click !</h5></b></div>
                                    <div id="panel">
                                        <div class="row">
                                            <div class="col-md-12">
                                              <textarea name="saksi" placeholder="Isian saksi-saksi" readonly><?php echo $row['saksi_saksi']; ?> </textarea>
                                          </div>
                                        </div>
                                    </div><!-- End Jquery Slide-->
                                    <br>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-sm btn-danger" onclick="self.history.back()">
                                <b style="color:#FAFAFA"><span class="fa fa-times"></span> Cancel</b>
                            </button>
                                    
                            <button type="submit" name="input" class="btn btn-primary pull-right">
                                <b style="color:#FAFAFA"><span class="fa fa-floppy-o" aria-hidden="true"></span> Update</b>
                            </button>   
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
    <script src="datetimepicker/moment.js"></script>
    <script src="datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datetimepicker({
                format: 'DD MMMM YYYY',
            });
        });
    </script>
    <script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>
<script>
        tinymce.init({
        selector: "textarea",theme: "modern",width: "100%",height: "200px",
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table directionality emoticons paste textcolor responsivefilemanager save table contextmenu"
       ],
       toolbar1: " save | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "link unlink anchor | image media | forecolor backcolor  | print preview code",
       relative_urls:false,

       external_filemanager_path:"./filemanager/",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
    });
    </script>
</body>

</html>
