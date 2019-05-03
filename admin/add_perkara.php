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
    <style type="text/css">
    @font-face {
      font-family: 'Cabin';
      font-style: normal;
      font-weight: 400;
      src: local('Cabin Regular'), local('Cabin-Regular'), url(font/satu.woff) format('woff');
    }
    @font-face {
      font-family: 'Cabin';
      font-style: normal;
      font-weight: 700;
      src: local('Cabin Bold'), local('Cabin-Bold'), url(font/dua.woff) format('woff');
    }
    @font-face {
      font-family: 'Lobster';
      font-style: normal;
      font-weight: 400;
      src: local('Lobster'), url(font/tiga.woff) format('woff');
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
                    $koderak = $row['koderak'];
                    $nama  = $row['nama'];
                }
            ?>
                 <!-- page header -->
                <div class="col-lg-12">
                    <h3 class="page-header"><center>Tambah Perkara Terdakwa</center></h3> 
                    <div class="row">
                        <div class="col-md-4">
                          <h4 style="font-family:'Cabin';">Nama: <b style="font-family:'Cabin';"><?php echo $nama; ?></b></h4>        
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4" align="right">
                          <h4 style="font-family:'Cabin';">Kode rak: <b style="font-family:'Cabin';"><?php echo $koderak; ?></b></h4>  
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                    <?php
                        include "kjn.php";
                        $shin = mysqli_query($conn,"SELECT count(koderak) AS kode FROM koderak
                                JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                                JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa
                                WHERE koderak='$koderak'");
                        $dd = mysqli_fetch_assoc($shin);
                            $jml_perkara = $dd['kode'];
                    ?>
                            <h4 style="font-family:'Cabin';">Jumlah Perkara: <b style="font-family:'Cabin';"><?php echo $jml_perkara; ?></b></h4>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4" align="right"></div>
                    </div>
                </div>
                <!--end page header -->
            </div>
            
 <?php
    include "kjn.php";
    error_reporting(0);
    //proses input data
    $noper = addslashes (strip_tags ($_POST['noper']));
    $noput = addslashes (strip_tags ($_POST['noput']));
    $umur = addslashes (strip_tags ($_POST['umur']));
    $tempat = addslashes (strip_tags ($_POST['tempat']));
    $ttl = addslashes (strip_tags ($_POST['ttl']));
    $jk = addslashes (strip_tags ($_POST['jk']));
    $kebangsaan = addslashes (strip_tags ($_POST['kebangsaan']));
    $tempating = addslashes (strip_tags ($_POST['tempating']));
    $agama = addslashes (strip_tags ($_POST['agama']));
    $pekerjaan = addslashes (strip_tags ($_POST['pekerjaan']));
    $saksi = addslashes (strip_tags ($_POST['saksi']));

    //variabel untuk upload gambar
    $target_dir1 = "pdf/web/upload/PN/";
    $target_dir2 = "pdf/web/upload/PT/";
    $target_dir3 = "pdf/web/upload/MA/";
    $target_dir4 = "pdf/web/upload/BP/";
    $target_file1 = $target_dir1 . basename($_FILES["Pn"]["name"]);
    $target_file2 = $target_dir2 . basename($_FILES["Pt"]["name"]);
    $target_file3 = $target_dir3 . basename($_FILES["Ma"]["name"]);
    $target_file4 = $target_dir4 . basename($_FILES["Bp"]["name"]);
    $picture1   = basename($_FILES['Pn'] ['name']);
    $picture2   = basename($_FILES['Pt'] ['name']);
    $picture3   = basename($_FILES['Ma'] ['name']);
    $picture4   = basename($_FILES['Bp'] ['name']);
    $uploadOk = 1;
    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
    $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
    $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
    $imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);
    //akhir variabel untuk upload gambar

    if (isset($_POST['input'])) {
        if ($uploadOk == 0) {
            echo "Maaf, data tidak terupload.";
        }else if($nama==""){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Nama tidak diisi, </strong> nama tidak boleh kosong !!
                  </div>";
        }else if($imageFileType1 != "pdf"){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Extensi file tidak cocok di PN </strong> hanya boleh upload file pdf !!
                  </div>";
            $uploadOk = 0;
        }else if($imageFileType2 != "pdf"){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Extensi file tidak cocok di PT </strong> hanya boleh upload file pdf !!
                  </div>";
            $uploadOk = 0;
        }else if($imageFileType3 != "pdf" && $imageFileType3 != "doc" && $imageFileType3 != "pdf" && $imageFileType3 != "pdf"){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Extensi file tidak cocok di MA </strong> hanya boleh upload file pdf !!
                  </div>";
            $uploadOk = 0;
        }else if($imageFileType4 != "pdf" && $imageFileType4 != "doc" && $imageFileType3 != "pdf" && $imageFileType4 != "pdf"){
            echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Extensi file tidak cocok di MA </strong> hanya boleh upload file pdf !!
                  </div>";
            $uploadOk = 0;
        }
        else{
            if((move_uploaded_file($_FILES["Pn"]["tmp_name"], $target_file1))and(move_uploaded_file($_FILES["Pt"]["tmp_name"], $target_file2))and(move_uploaded_file($_FILES["Ma"]["tmp_name"], $target_file3))and(move_uploaded_file($_FILES["Bp"]["tmp_name"], $target_file4))) {
                $query = "INSERT INTO terdakwa VALUES('','$noper','$noput','$nama','$umur','$tempat','$ttl','$jk','$kebangsaan','$tempating','$agama','$pekerjaan','$picture1','$picture2','$picture3','$picture4',now())";

                $sql = mysqli_query ($conn,$query);
                $last_id = mysqli_insert_id($conn);  
                   
                $barcode = "INSERT INTO koderak VALUES ('','$last_id','$koderak',now())";
                $saksi = "INSERT INTO saksi VALUES ('','$last_id','$saksi',now())";

                $sql2 = mysqli_query ($conn,$barcode);
                $sql3 = mysqli_query ($conn,$saksi);

                if (($sql)and($sql2)and($sql3)) {
                    echo '<script>
                            swal({
                                title:"Berhasil",
                                text: "Data berhasil ditambahkan!",
                                type: "success",
                            },
                            function(){
                                window.location.href = "view_arsip.php";
                            });
                          </script>';
                }else{
                    echo '<script>swal("Gagal!", "Ada kesalahan pemasukan data!", "warning")</script>';
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
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
                                    <div class="container-fluid">
                                        <div class="col-md-6">
                                         <div class="form-group">
                                          <label for="usr">Nomor Perkara</label>
                                          <input type="text" name="noper" class="form-control" placeholder="Nomor Perkara Terdakwa" value="<?php echo isset($_POST['noper']) ? $_POST['noper'] : ''; ?>">
                                         </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="usr">Nomor Putusan</label>
                                            <input type="text" name="noput" class="form-control" placeholder="Nomor Putusan Terdakwa" value="<?php echo isset($_POST['noput']) ? $_POST['noput'] : ''; ?>">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="usr">Umur</label>
                                            <input type="text" name="umur" class="form-control" placeholder="Umur" value="<?php echo isset($_POST['umur']) ? $_POST['umur'] : ''; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                         <div class="form-group">
                                           <label>Tempat Lahir</label>
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" autocomplete="off" value="<?php echo $row['tempat']; ?>" readonly>
                                         </div>
                                        </div>
                                      <div class="col-md-5">
                                        <label>Tanggal Lahir</label>
                                          <div class='input-group date' id='datepicker'>
                                            <input type='text' name="ttl" class="form-control" placeholder="Tanggal Bulan Tahun Lahir" value="<?php echo $row['ttl']; ?>" readonly/>
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
                                           <input type="text" name="jk" class="form-control" placeholder="Kebangsaan Terdakwa" autocomplete="off" value="<?php echo $row['jk']; ?>" readonly>
                                        </div>
                                      </div>
                                      <div class="col-md-7"></div>
                                    </div>

                                    <div class="form-group">
                                    <label>Kebangsaan</label>
                                      <input type="text" name="kebangsaan" class="form-control" placeholder="Kebangsaan Terdakwa" autocomplete="off" value="<?php echo isset($_POST['kebangsaan']) ? $_POST['kebangsaan'] : ''; ?>">
                                    </div>

                                    <div class="form-group">
                                    <label>Tempat Tinggal</label>
                                      <input type="text" name="tempating" class="form-control" placeholder="Tempat Tinggal" autocomplete="off" value="<?php echo isset($_POST['tempating']) ? $_POST['tempating'] : ''; ?>">
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
                                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" autocomplete="off" value="<?php echo isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : ''; ?>">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group"> <label for="exampleInputFile">Upload File Putusan PN</label>
                                           <input type="file" name="Pn" id="Pn">
                                          </div>
                                          </div>
                                        
                                        
                                        <div class="col-md-3">
                                         <div class="form-group"> <label for="exampleInputFile">Upload File Putusan PT</label>
                                        <input type="file" name="Pt" id="Pt">
                                          </div>   
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"> <label for="exampleInputFile">Upload File Putusan MA</label>
                                            <input type="file" name="Ma" id="Ma">
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
                                        <div class="col-md-3">
                                            <div class="form-group"> <label for="exampleInputFile">Upload Berkas Perkara</label>
                                            <input type="file" name="Bp" id="Bp">
                                          </div>
                                        </div>
                                    </div>
                                    
                                <!-- Jquery Slide-->
                                <div id="flip"> <h5><b class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></b><b>Saksi - saksi : Click !</h5></b></div>
                                    <div id="panel">
                                        <div class="row">
                                          <div class="col-md-12">
                                              <textarea name="saksi" placeholder="Isian saksi-saksi">
                                              <?php echo isset($_POST['saksi']) ? $_POST['saksi'] : ''; ?>
                                              </textarea>
                                          </div>
                                        </div>
                                    </div><!-- End Jquery Slide-->
                                    <br>
                                </div>
                            </div>
                            
                            <button type="submit" name="input" class="btn btn-info pull-right"><b style="color:white;"><span class="fa fa fa-floppy-o" aria-hidden="true"></span> Simpan</b></button>   
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
