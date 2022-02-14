<!-- <?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $sql = "SELECT * FROM data_user WHERE username='$username'";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $username = $data['username'];
        $password = $data['password'];
        $nik = $data['nik'];
        $nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat_lahir = $data['tempat_lahir'];
		$tanggal_lahir = $data['tanggal_lahir'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
		$hak_akses = $data['hak_akses'];
		$warga = $data['warga'];
    }
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Username</label>
													<input type="text" readonly="" name="username" value="<?php echo $username;?>" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>NIK</label>
													<input type="text" name="nik" class="form-control" value="<?php echo $nik;?>" placeholder="NIK..">
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama..">
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir;?>" placeholder="Tempat Lahir.." >
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal_lahir" class="form-control"  value="<?php echo $tanggal_lahir;?>">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki" <?php if($jekel=="Laki-Laki") echo 'selected'?>>Laki-Laki</option>
														<option value="Perempuan" <?php if($jekel=="Perempuan") echo 'selected'?>>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control"  cols="30" rows="10" placeholder="Alamat.."><?php echo $alamat;?></textarea>
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option value="Sekolah" <?php if($status_warga=="Sekolah") echo 'selected'?>>Sekolah</option>
														<option value="Kerja" <?php if($status_warga=="Kerja") echo 'selected'?>>Kerja</option>
														<option value="Belum Kerja" <?php if($status_warga=="Belum Kerja") echo 'selected'?>>Belum Kerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" value="<?php echo $password;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option value="Pemohon" <?php if($hak_akses=="Pemohon") echo 'selected'?>>Pemohon</option>
														<option value="Ketua RW" <?php if($hak_akses=="Ketua RW") echo 'selected'?>>Ketua RW</option>
														<option value="Ketua RT" <?php if($hak_akses=="Ketua RT") echo 'selected'?>>Ketua RT</option>
													</select>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success btn-sm">Ubah</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    $nik = $data['nik'];
	$nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat = $data['tempat'];
		$tanggal = $data['tanggal'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
		$warga = $data['warga'];

    $sql = "UPDATE data_user SET
    password='$password',
    hak_akses='$hak_akses',
	nama='$nama' WHERE username='$username'";
    $query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
?> -->

<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
		$tampil_username = "SELECT * FROM data_user WHERE username=$username";
		$query = mysqli_query($konek,$tampil_username);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$username = $data['username'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat_lahir'];
		$tanggal_lahir = $data['tanggal_lahir'];
		$jekel = $data['jekel'];
		$agama = $data['agama'];
		$alamat = $data['alamat'];
		$telepon = $data['telepon'];
		$status_warga = $data['status_warga'];
		$hak_akses = $data['hak_akses'];
	}
	
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Username</label>
													<input type="number" name="username" class="form-control" placeholder="Username Anda.." value="<?= $username;?>" readonly>
												</div>
													<div class="form-group">
													<label>NIK</label>
													<input type="text" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>">
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama;?>">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki" <?php if($jekel=="Laki-Laki") echo 'selected'?>>Laki-Laki</option>
														<option value="Perempuan" <?php if($jekel=="Perempuan") echo 'selected'?>>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat_lahir" class="form-control" value="<?= $tempat_lahir;?>" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal_lahir" class="form-control" value="<?= $tanggal_lahir;?>">
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="5"><?= $alamat?></textarea>
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option value="Sekolah" <?php if($status_warga=="Sekolah") echo 'selected'?>>Sekolah</option>
														<option value="Kerja" <?php if($status_warga=="Kerja") echo 'selected'?>>Kerja</option>
														<option value="Belum Kerja" <?php if($status_warga=="Belum Kerja") echo 'selected'?>>Belum Kerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" value="<?php echo $password;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disbaled="" selected="">Pilih Hak Akses</option>
														<option value="Warga RT01" <?php if($hak_akses=="Warga RT01") echo 'selected'?>>Warga RT01</option>

														<option value="Warga RT02" <?php if($hak_akses=="Warga RT02") echo 'selected'?>>Warga RT02</option>
														
														<option value="Ketua RW" <?php if($hak_akses=="Ketua RW") echo 'selected'?>>Ketua RW</option>
														<option value="Ketua RT" <?php if($hak_akses=="Ketua RT") echo 'selected'?>>Ketua RT</option>
													</select>
												</div>
												
													</select>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_user" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$username = $_POST['username'];
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$status_warga = $_POST['status_warga'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$warga = $_POST['warga'];

	$sql = "UPDATE data_user SET
	nik = '$nik',
	nama='$nama',
	tanggal_lahir='$tgl',
	tempat_lahir='$tempat',
	jekel='$jekel',
	agama='$agama',
	alamat='$alamat',
	status_warga='$status_warga',
	password='$password',
	hak_akses='$hak_akses',
	warga = '$warga' WHERE username=$username";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
	
?>