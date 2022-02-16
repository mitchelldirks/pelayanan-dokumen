<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Username</label>
													<input type="nama" name="username" class="form-control" placeholder="Username.." autofocus autocomplete=’off’>
												</div>
												<div class="form-group">
													<label>NIK</label>
													<input type="nama" name="nik" class="form-control" placeholder="NIK.." autofocus autocomplete=’off’>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="nama" name="nama" class="form-control" placeholder="Nama.."autofocus autocomplete=’off’>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir.." autofocus autocomplete=’off’>
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal_lahir" class="form-control" >
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat.."autofocus autocomplete=’off’></textarea>
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option value="Sekolah">Sekolah</option>
														<option value="Kerja">Kerja</option>
														<option value="Belum Bekerja">Belum Bekerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password..">
												</div>
												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disabled="" selected="">Pilih Hak Akses</option>
														<option value="warga">Warga</option>
														<option value="admin">Admin</option>
														<option value="rw">Ketua RW</option>
														<option value="rt">Ketua RT</option>
													</select>
												</div>

												<?php if($_SESSION['hak_akses'] == 'admin' || $_SESSION['hak_akses'] == 'rw'){ ?>
												<div class="form-group">
													<label>Warga</label>
													<select name="warga" class="form-control">
														<option disabled="" selected="">Pilih Lokasi Warga</option>
														<option value="RT1">Warga RT 01</option>
														<option value="RT2">Warga RT 02</option>
													</select>
												</div>
												<?php }else{ ?>
													<input type="hidden" name="warga" value="<?php echo $_SESSION['warga']; ?>">
												<?php } ?>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['simpan'])){
	$username = $_POST['username'];
	$nik = $_POST['nik'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	
	$nama = $_POST['nama'];
	$jekel = $_POST['jekel'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$status_warga = $_POST['status_warga'];
	$alamat = $_POST['alamat'];
	$warga = $_POST['warga'];

	$sql = "INSERT INTO data_user (username, nik,password,hak_akses, nama,jekel,tempat_lahir,tanggal_lahir,status_warga,alamat,warga) VALUES ('$username','$nik','$password','$hak_akses','$nama','$jekel','$tempat_lahir','$tanggal_lahir','$status_warga','$alamat','$warga')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	  }
}
?>