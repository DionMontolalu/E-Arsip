<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Arsip</title>
    <link rel="icon" type="image/png" href="admin/icon.png">
    <!-- Core CSS - Include with every page -->
    <link href="admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="admin/assets/css/style.css" rel="stylesheet" />
    <link href="admin/assets/css/main-style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="admin/sweetalert/dist/sweetalert.css">
  <script type="text/javascript" src="admin/sweetalert/dist/sweetalert.min.js"></script>
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
    </style>
</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="logo.png" width="40%">
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Form Login</center></h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" name="login">Login</button>
                            </fieldset>
                        </form>
                    </div>
        <?php
            if(isset($_POST['login'])){
                session_start();
                include "admin/kjn.php";

                $username = addslashes (strip_tags ($_POST['username']));
                $password = addslashes (strip_tags ($_POST['password']));

                $sql = "SELECT * FROM user WHERE username = '$username'";
                $hasil = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($hasil);

                if(($username == $data['username'])and($password == $data['password'])){
                    $_SESSION['level'] = $data['level'];
                    $_SESSION['username'] = $data['username'];
                    echo '<script>
                        swal({
                            title: "Login Berhasil",
                            text: "Silahkan tekan OK untuk ke halaman Dashboard!",
                            type: "success",
                        },
                        function(){
                            window.location.href = "admin/home.php";
                        });
                        </script>';
                }else{
                    echo "<div class=\"peringatan\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    <strong> Username atau Password anda salah, </strong> silahkan masukan kembali yang benar !!
                  </div>";
                }
            }
        ?>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="admin/assets/plugins/jquery-1.10.2.js"></script>
    <script src="admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
