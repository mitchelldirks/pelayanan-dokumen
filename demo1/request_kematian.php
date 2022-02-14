<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	$tampil_username = "SELECT * FROM data_user WHERE username=$_SESSION[username]";
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$username = $data['username'];
	$nama = $data['nama'];

?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN KEMATIAN</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Username</label>
													<input type="text" class="form-control" value="<?= $username.' - '.$nama;?>" readonly>
												</div>
												<div class="form-group">
													<input type="hidden" name="username" class="form-control" value="<?= $username;?>" readonly>
												</div>

												<div class="form-group">
													<label>Keperluan</label>
													<input type="text" name="keperluan" class="form-control" placeholder="Keperluan Anda..."required autofocus autocomplete=’off’>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan KTP</label>
													<input type="file" name="scan_ktp" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KK</label>
													<input type="file" name="scan_kk" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KTP Saksi 1</label>
													<input type="file" name="ktp1" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KTP Saksi 2</label>
													<input type="file" name="ktp2" class="form-control" size="37" required>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="kirim" class="btn btn-success">Kirim</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['kirim'])){
	$username = $_POST['username'];
	
	$keperluan = $_POST['keperluan'];
	$nama_ktp = isset($_FILES['scan_ktp']);
	$file_ktp = $_POST['username']."_".".jpg";
	$nama_kk = isset($_FILES['scan_kk']);
	$file_kk = $_POST['username']."_".".jpg";
	$nama_ktp1= isset($_FILES['scan_ktp']);
    $file_ktp1 = $_POST['username']."_".".jpg";
    $nama_ktp2 = isset($_FILES['scan_ktp']);
    $file_ktp2 = $_POST['username']."_".".jpg";
   
	$sql = "INSERT INTO data_request_kematian (username,scan_ktp,scan_kk,scan_ktp1,scan_ktp2,keperluan) VALUES ('$username','$file_ktp','$file_kk','$file_ktp1','$file_ktp2','$keperluan')";
	$query = mysqli_query($konek,$sql) or die (mysqli_error());

	if($query){
		copy($_FILES['scan_ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
		copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
		copy($_FILES['scan_ktp1']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp1);
		copy($_FILES['scan_ktp2']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp2);
		



		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_kematian">';
	  }
}
	
?>