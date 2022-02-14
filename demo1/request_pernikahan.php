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
									<div class="card-title">FORM TAMBAH REQUEST SURAT PENGANTAR PERNIKAHAN</div>
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
													<label>Scan Akta Lahir</label>
													<input type="file" name="akta_lahir" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Ijazah</label>
													<input type="file" name="ijazah" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Surat Nikah</label>
													<input type="file" name="scan_suratnikah" class="form-control" size="37" required>
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
	$nama_akta = isset($_FILES['akta_lahir']);
	$file_akta = $_POST['username']."_".".jpg";
	$nama_ijazah = isset($_FILES['ijazah']);
    $file_ijazah = $_POST['username']."_".".jpg";
    $nama_sn = isset($_FILES['scan_suratnikah']);
    $file_sn = $_POST['username']."_".".jpg";
   
	$sql = "INSERT INTO data_request_pernikahan (username,akta_lahir,ijazah,scan_suratnikah,keperluan) VALUES ('$username','$file_akta','$file_ijazah','$file_sn','$keperluan')";
	$query = mysqli_query($konek,$sql) or die (mysqli_error());

	if($query){
		copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
		copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
		copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
		



		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_pernikahan">';
	  }
}
	
?>