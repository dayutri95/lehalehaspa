<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Login</title>
    <?php include'style.php' ?>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-gray">
     
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  
       <div class="container ">
       <!--<center><img src="lehaleha2.png" width="350px"></center>-->
      <div class="card card-login mx-auto mt-2">

      <?php 
           if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){

                 echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                 <center>Username dan Password tidak valid!</center>
                 </div>";
                }else if($_GET['pesan'] == "logout"){
                        echo "Anda telah berhasil logout";
                }else if($_GET['pesan'] == "belum_login"){
                        echo "Anda harus login untuk mengakses halaman admin";
              }
           }
        ?>
        <center><h1 ><strong><div class="card-header bg-gray">Login</div></strong></h1></center>
        <div class="card-body">
          <form id="Login" action="check-login.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="username"id="inputUsername" class="form-control" placeholder="username" required="required" autofocus="autofocus">
                <label for="inputUsername">user name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password"id="inputPassword" class="form-control" placeholder="password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-pull-right">Login</a></button>
          </form>
          </div>
      </div>
    </div>

    <?php include 'jscript.php' ?>

    <?php 'footer.php';?>
    </center>     
  </body>
</html>