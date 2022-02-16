<?php include '../konek.php';?>
<style type="text/css">
	.active{
		color: black;
	}
</style>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
                <div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
							<nav class="nav">
							  <a class="nav-link <?php echo $_GET['page'] =='akta'?'active':'' ?>" href="?halaman=approval&page=akta">Akta</a>
							  <a class="nav-link <?php echo $_GET['page'] =='kk'?'active':'' ?>" href="?halaman=approval&page=kk">Kartu Keluarga</a>
							  <a class="nav-link <?php echo $_GET['page'] =='ktp'?'active':'' ?>" href="?halaman=approval&page=ktp">KTP</a>
							  <a class="nav-link <?php echo $_GET['page'] =='pernikahan'?'active':'' ?>" href="?halaman=approval&page=pernikahan">Pernikahan</a>
							  <a class="nav-link <?php echo $_GET['page'] =='kematian'?'active':'' ?>" href="?halaman=approval&page=kematian">Kematian</a>
							  <a class="nav-link <?php echo $_GET['page'] =='skck'?'active':'' ?>" href="?halaman=approval&page=skck">SKCK</a>
							  <a class="nav-link <?php echo $_GET['page'] =='skd'?'active':'' ?>" href="?halaman=approval&page=skd">SKD</a>
							</nav>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="fw-bold text-uppercase">Request Surat</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<?php 
										switch ($_GET['page']) {
										 	case 'akta': 	include "approval_akta.php"; break;
										 	case 'kk': 		include "approval_kk.php"; break;
										 	case 'ktp': 	include "approval_ktp.php"; break;
										 	case 'pernikahan': include "approval_pernikahan.php"; break;
										 	case 'kematian': include "approval_kematian.php"; break;
										 	case 'skck': 	include "approval_skck.php"; break;
										 	case 'skd': 	include "approval_skd.php"; break;
										 	
										 	default:
										 		// code...
										 		break;
										 } ?>
									</div>
								</div>
							</div>
                        </div>
                        
					</div>
				</div>
				
				<?php
    if(isset($_POST['acc'])){
        if(isset($_POST['check']))
        {
                    foreach ($_POST['check'] as $value){
                        // echo $value;
                        $ubah = "UPDATE data_request_akta set status =1 where id_request_akta = $value"; 

                        $query = mysqli_query($konek,$ubah);

                        if($query) {
                            echo "<script language='javascript'>swal('Selamat...', 'ACC Ketua RT Berhasil!', 'success');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_akta">';
                        }else{
                            echo "<script language='javascript'>swal('Gagal...', 'ACC Ketua RT Gagal!', 'error');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_akta">';
                        }

                    }
        }
    }
?>