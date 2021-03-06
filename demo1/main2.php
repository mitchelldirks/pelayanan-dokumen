<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 }
 ?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="main2.php">
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
						if($hak_akses=="Ketua RT"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-user-alt"></i>
								<p>Data User</p>
								<span class="caret"></span>
							</a>
								<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_user">
											<span class="sub-item">Data User RT 01</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_user02">
											<span class="sub-item">Data User RT 02</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="?halaman=permohonan_surat">
								<i class="far fa-calendar-check"></i>
								<p>Cetak Surat</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=surat_dicetak">
								<i class="far fa-calendar-check"></i>
								<p>Surat Selesai</p>
							</a>
						</li>
						<?php
							 }elseif ($hak_akses=="Ketua RW"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=laporan_perbulan">
											<span class="sub-item">Perbulan</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_pertahun">
											<span class="sub-item">Pertahun</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
            <?php
							}elseif($hak_akses=="Admin"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-user-alt"></i>
								<p>Data User</p>
								<span class="caret"></span>
							</a>
								<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_user">
											<span class="sub-item">Data User RT 01</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_user02">
											<span class="sub-item">Data User RT 02</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
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
			  case 'tampil_pemohon';
                include 'tampil_pemohon.php';
			  break;
			  case 'request_skck';
                include 'request_skck.php';
			  break;
			  case 'request_ktp';
                include 'request_ktp.php';
			  break;
			  case 'request_kk'; // skp
                include 'request_kk.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
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
                include 'belum_acc_ktp.php'; // ktp sku
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
			  case 'view_skck';
                include 'view_skck.php';
			  break;
			  case 'view_ktp';
                include 'view_ktp.php';
			  break;
			  case 'view_kk';
                include 'view_kk.php';
			  break;
			  case 'view_skd';
                include 'view_skd.php';
        break;
			  case 'view_akta';
                include 'view_akta.php';
        break;
			  case 'view_pernikahan';
                include 'view_pernikahan.php';
        break;
			  case 'view_kematian';
                include 'view_kematian.php';
			  break;
			  case 'view_cetak_skck';
                include 'view_cetak_skck.php';
			  break;
			  case 'view_cetak_ktp';
                include 'view_cetak_ktp.php';
			  break;
			  case 'view_cetak_kk';
                include 'view_cetak_kk.php';
			  break;
			  case 'view_cetak_skd';
                include 'view_cetak_skd.php';
        break;
			  case 'view_cetak_akta';
                include 'view_cetak_akta.php';
        break;
			  case 'view_cetak_pernikahan';
                include 'view_cetak_pernikahan.php'; 
        break;
			  case 'view_cetak_kematian';
                include 'view_cetak_kematian.php';
			  break;
			  case 'surat_dicetak';
                include 'surat_dicetak.php';
              break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
			  break;
			  case 'permohonan_surat';
                include 'permohonan_surat.php';
              break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda2.php';
          }
        ?>
			</div>

<?php include 'footer.php'; ?>