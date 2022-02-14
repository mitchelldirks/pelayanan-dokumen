<?php include 'konek.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Login Pemohon</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="main/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="main/vendors/base/vendor.bundle.base.css">
  <link href="main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="main/js/jquery-2.1.3.min.js"></script> 
  <script src="main/js/sweetalert.min.js"></script>

  <script src="main/js/sweetalert-dev.js"></script>    
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="main/css/style.css">
</head>
   
   <style type="text/css">
  body{
    background-image: url("22.PNG");
  }
</style> 

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="main/img/GBJ.png" width="150" height="54" alt="logo">
              </div>
              <h4>LOGIN PEMOHON</h4>
              <h6 class="font-weight-light"></h6>
              <form method="POST" class="pt-3">
                <div class="form-group">
                <label>Pilih User</label>
                  <select name="hak_akses" id="" class="form-control text-uppercase">
                    <option value="" selected="selected">Login sebagai</option>
                    <?php
                        $SQL = "SELECT * FROM data_user WHERE hak_akses='Warga RT 01' or hak_akses='Warga RT 02' "; 
                        $QUERY = mysqli_query($konek,$SQL);
                        while($data=mysqli_fetch_array($QUERY,MYSQLI_BOTH)){
                          $hak_akses = $data['hak_akses'];
                    ?>
                    <option value="<?php echo $hak_akses;?>">
                    <?php echo $hak_akses;?>
                      
                   </option>
                    <?php 
                        }
                    ?>
                  </select>
                </div>

               <div class="form-group">
               <label>Username</label>
                  <input type="text" name="username" class="form-control form-control-xs text-bold" placeholder="Username Anda.." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16" required autofocus autocomplete=’off’>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control form-control-xs" placeholder="Password Anda.." required autofocus>
                </div>
                <div class="mt-3">
                  <!-- <a href="SBAdmin/index.html" class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn">LOGIN</a> -->
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    LOGIN
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                </div>
                <div class="mb-2">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost/pelayanandokumenonlinerw024/">BATAL</a>
                </div>
              <!--div class="text-center mt-4 font-weight-light">
                 <a href="#register.php" class="text-primary"></a>
                </div>---> 
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- login -->
  <?php
    if(isset($_POST['login'])){
      $hak_akses = $_POST['hak_akses'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      
        $sql_login = "SELECT * FROM data_user WHERE hak_akses='$hak_akses'AND username='$username' AND password='$password'";
        $query_login = mysqli_query($konek,$sql_login);
        $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if($jumlah_login > 0){
          session_start();
            $_SESSION['hak_akses']=$data_login['hak_akses'];
           $_SESSION['username']=$data_login['username'];
            $_SESSION['password']=$data_login['password'];
            

          echo "<script language='javascript'>swal('Selamat...', 'Login Berhasil!', 'success');</script>" ;
          echo '<meta http-equiv="refresh" content="3; url=demo1/main.php">';
        }else{
          echo "<script language='javascript'>swal('Gagal...', 'Login Gagal', 'error');</script>" ;
          echo '<meta http-equiv="refresh" content="3; url=login.php">';
        }
    }
  ?>


  <!-- plugins:js -->
  <script src="main/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="main/js/off-canvas.js"></script>
  <script src="main/js/hoverable-collapse.js"></script>
  <script src="main/js/template.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script> 
</body>
 
</html>

<!-- oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16"  -->