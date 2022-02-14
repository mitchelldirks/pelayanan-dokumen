<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_pernikahan'])){
		$id_request_pernikahan=$_GET['id_request_pernikahan'];
		$sql = "SELECT * FROM data_request_pernikahan natural join data_user WHERE id_request_pernikahan='$id_request_pernikahan'";
		$query = mysqli_query($konek,$sql);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$username = $data['username'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$warga = $data['warga'];
		$tempat = $data['tempat_lahir'];
		$tgl = $data['tanggal_lahir'];
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
		$nama = $data['nama'];
		$id = $data['id_request_pernikahan'];
		$akta_lahir = $data['akta_lahir'];
		$ijazah = $data['ijazah'];
		$sn = $data['scan_suratnikah'];
        
		$keterangan = $data['keterangan'];
		$keperluan = $data['keperluan'];
	}
?>
				<div class="page-inner">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-7">
								<div class="card">
									<div class="card-header">
												<div class="form-group">
												<label>Keterangan</label>
												<input type="text" name="keterangan" class="form-control" autofocus><br>
												<button type="submit" name="ubah" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fas fa-edit"></i>
												</span>
												Ubah
												</button>
												<a href="?halaman=sudah_acc_pernikahan" class="btn btn-info btn-border btn-round btn-sm">
													Batal
												</a>
												</div>
									</div>
									<div class="card-body">
										<div class="row">
										<div class="col-md-6 col-lg-6">
													<div class="form-group">
														<label>Username</label>
														<input type="number" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Username Anda.." autofocus readonly>
													</div>
													<div class="form-group">
														<label>NIK</label>
														<input type="text" name="nik" value="<?php echo $nik;?>" class="form-control" placeholder="NIK Anda..">
													</div>
													<div class="form-group">
														<label>Nama</label>
														<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" placeholder="Nama Lengkap Anda..">
													</div>
													<div class="form-check">
														<label>Jenis Kelamin</label><br/>
														<label class="form-radio-label">
															<input class="form-radio-input" type="radio" name="jekel" value="Laki-Laki" <?php if($jekel=="Laki-Laki") echo 'checked'?>>
															<span class="form-radio-sign">Laki-Laki</span>
														</label>
														<label class="form-radio-label ml-3">
															<input class="form-radio-input" type="radio" name="jekel" value="Perempuan" <?php if($jekel=="Perempuan") echo 'checked'?>>
															<span class="form-radio-sign">Perempuan</span>
														</label>
													</div>
													<div class="form-group">
														<label>Tempat Lahir</label>
														<input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" class="form-control" placeholder="Tempat Lahir Anda..">
													</div>
													<div class="form-group">
														<label>Tanggal Lahir</label>
														<input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" class="form-control">
													</div>
												</div>
												<div class="col-md-6 col-lg-6">
													<div class="form-group">
														<label>Agama</label>
														<select name="agama" value="<?php echo $agama;?>" class="form-control">
															<option value="Islam" <?php if($agama=="Islam") echo 'selected'?>>Islam</option>
															<option value="Kristen" <?php if($agama=="Kristen") echo 'selected'?>>Kristen</option>
															<option value="Katolik" <?php if($agama=="Katolik") echo 'selected'?>>Katolik</option>
															<option value="Hindu" <?php if($agama=="Hindu") echo 'selected'?>>Hindu</option>
															<option value="Budha" <?php if($agama=="Budha") echo 'selected'?>>Budha</option>
														</select>
													</div>
													<div class="form-group">
														<label for="comment">Alamat</label>
														<textarea class="form-control" name="alamat" rows="5"> <?php echo $alamat;?></textarea>
													</div>	
													<div class="form-group">
														<label>Status Warga</label>
														<select name="status_warga" value="<?php echo $status_warga;?>" class="form-control">
															<option value="Sekolah" <?php if($status_warga=="Sekolah") echo 'selected'?>>Sekolah</option>
															<option value="Kerja" <?php if($status_warga=="Kerja") echo 'selected'?>>Kerja</option>
															<option value="Belum Bekerja" <?php if($status_warga=="Belum Bekerja") echo 'selected'?>>Belum Bekerja</option>
														</select>
													</div>	
													<div class="form-group">
														<label>Keperluan</label>
														<input type="text" name="keperluan" readonly="" class="form-control" placeholder="Keperluan Anda.." value="<?=$keperluan;?>">
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Akta Lahir</h4>
									</div>
									<div class="card-body">
										<div class="row justify-content-md-center">
														<img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="300" height="300" alt="">
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Ijazah</h4>
									</div>
									<div class="card-body">
										<div class="row justify-content-md-center">
										<img src="../dataFoto/ijazah/<?php echo $ijazah;?>" width="300" height="300" alt="">
										</div>
									</div>
								</div>

									<div class="card">
									<div class="card-header">
										<h4 class="card-title">Scan Surat Nikah Orang Tua</h4>
									</div>
									<div class="card-body">
										<div class="row justify-content-md-center">
										<img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="350" height="250" alt="">
										</div>
									</div>
								</div>
                               
                                

							</div>
						</div>
					</form>
				</div>

<?php
	if(isset($_POST['ubah'])){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$jekel = $_POST['jekel'];
		$agama = $_POST['agama'];
		$alamat = $_POST['alamat'];
		$status_warga = $_POST['status_warga'];
		$keperluan = $_POST['keperluan'];
		$keterangan = $_POST['keterangan'];

		$ubah = "UPDATE data_user SET
		nik = '$nik',
		nama='$nama',
		tanggal_lahir='$tanggal_lahir',
		tempat_lahir='$tempat_lahir',
		jekel='$jekel',
		agama='$agama',
		alamat='$alamat',
		status_warga='$status_warga' WHERE username='$username'";
		$query = mysqli_query($konek,$ubah);

		if($query==1){
			$keterangan = $_POST['keterangan'];
			$ubah = "UPDATE data_request_pernikahan SET
		keterangan='$keterangan' WHERE id_request_pernikahan='$id_request_pernikahan'";
		$quey = mysqli_query($konek,$ubah);
		if($quey==1){
			echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
			echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_pernikahan">';

		}
		  }else{
			echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
			echo '<meta http-equiv="refresh" content="3; url=?halaman=detail_pernikahan">';
		  }
	}
?>
             