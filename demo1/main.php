<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="" || ($_SESSION['username'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
  $nama = $_SESSION['nama'];
 $username = $_SESSION['username'];
 
 }
 ?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="main.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">fitur</h4>
						</li>

				
						 <?php
						 	if($hak_akses=="Warga RT01"){ /// Pemohon
						 ?>
						<li class="nav-item">
							<a href="?halaman=tampil_pemohon">
								<i class="fas fa-user-alt"></i>
								<p>Biodata Anda</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_status">
								<i class="far fa-calendar-check"></i>
								<p>Status Request</p>
							</a>
						</li>
						<?php
							}
						?>
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a> 
						</li>
					</ul>
				</div>
			</li>
        <?php
              }else if($hak_akses=="Warga RT02"){
						 ?>
						<li class="nav-item">
							<a href="?halaman=tampil_pemohon02">
								<i class="fas fa-user-alt"></i>
								<p>Biodata Anda</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_status">
								<i class="far fa-calendar-check"></i>
								<p>Status Request</p>
							</a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
						<?php
							}
						?>
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a> 
						</li>
					</ul>
				</div>
     </div>  
    </div>
  




		
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
			<?php
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch($hal){
              case 'beranda';
                include 'beranda.php';
              break;
              case 'ubah_pemohon';
                include 'ubah_pemohon.php';
              break;
              case 'ubah_pemohon02';
                include 'ubah_pemohon02.php';
			  break;
			  case 'tampil_pemohon';
                include 'tampil_pemohon.php';
         break;
			  case 'tampil_pemohon02';
                include 'tampil_pemohon02.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
			  break;
			  case 'request_skck';
                include 'request_skck.php';
			  break;
			  case 'request_ktp'; //sku
                include 'request_ktp.php';
			  break;
			  case 'request_kk'; // skp
                include 'request_kk.php';
        break;
			  case 'request_akta'; 
                include 'request_akta.php';
        break;
			  case 'request_pernikahan';
                include 'request_pernikahan.php';
        break;
			  case 'request_kematian';
                include 'request_kematian.php';
			  break;
			  case 'tampil_status';
                include 'status_request.php';
			  break;
			  case 'belum_acc_skck';
                include 'belum_acc_skck.php';
			  break;
			  case 'belum_acc_ktp';
                include 'belum_acc_ktp.php'; //sku
			  break;
			  case 'belum_acc_kk';
                include 'belum_acc_kk.php';
			  break;
			  case 'belum_acc_skd';
                include 'belum_acc_skd.php';
        break;
			  case 'belum_acc_akta';
                include 'belum_acc_akta.php';
         break;
			  case 'belum_acc_pernikahan';
                include 'belum_acc_pernikahan.php';
         break;
			  case 'belum_acc_kematian';
                include 'belum_acc_kematian.php';
			  break;
			  case 'sudah_acc_skck';
                include 'acc_skck.php';
			  break;
			  case 'sudah_acc_ktp';
                include 'acc_ktp.php';
			  break;
			  case 'sudah_acc_kk';
                include 'acc_kk.php';
			  break;
			  case 'sudah_acc_skd';
                include 'acc_skd.php';
        break;
			  case 'sudah_acc_akta';
                include 'acc_akta.php';
        break;
			  case 'sudah_acc_pernikahan';
                include 'acc_pernikahan.php';
        break;
			  case 'sudah_acc_kematian';
                include 'acc_kematian.php';  
			  break;
			  case 'detail_skck';
                include 'detail_skck.php';
			  break;
			  case 'detail_ktp';
                include 'detail_ktp.php';
			  break;
			  case 'detail_kk';
                include 'detail_kk.php';
			  break;
			  case 'detail_skd';
                include 'detail_skd.php';
        break;
			  case 'detail_akta';
                include 'detail_akta.php';
        break;
			  case 'detail_pernikahan';
                include 'detail_pernikahan.php';
        break;
			  case 'detail_kematian';
                include 'detail_kematian.php';
			  break;
			  case 'cetak_skck';
                include 'cetak_skck.php';
        break;
			  case 'cetak_ktp';
                include 'cetak_ktp.php';
        break;
			  case 'cetak_kk';
                include 'cetak_kk.php';
        break;
			  case 'cetak_skd';
                include 'cetak_skd.php';
        break;
			  case 'cetak_akta';
                include 'cetak_akta.php';
        break;
			  case 'cetak_pernikahan';
                include 'cetak_pernikahan.php';  
        break;
			  case 'cetak_kematian';
                include 'cetak_kematian.php';
			  break;
			  case 'tampil_user';
                include 'tampil_user.php';
        break;
			  case 'tampil_user02';
                include 'tampil_user02.php';
			  break;
			  case 'tambah_user';
                include 'tambah_user.php';
        break;
			  case 'tambah_user02';
                include 'tambah_user02.php';
			  break;
			  case 'ubah_user';
                include 'ubah_user.php';
        break;
			  case 'ubah_user02';
                include 'ubah_user02.php';
			  break;
			  case 'ubah_skck';
                include 'ubah_request_skck.php';
			  break;
			  case 'ubah_ktp';
                include 'ubah_request_ktp.php';
			  break;
			  case 'ubah_kk';
                include 'ubah_request_kk.php';
			  break;
			  case 'ubah_skd';
                include 'ubah_request_skd.php';
        break;
			  case 'ubah_akta';
                include 'ubah_request_akta.php';
        break;
			  case 'ubah_pernikahan';
                include 'ubah_request_pernikahan.php';
        break;
			  case 'ubah_kematian';
                include 'ubah_request_kematian.php';
        break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
              break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda.php';
          }
        ?>

			</div>
<?php include 'footer.php'; ?>