<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	$tampil_username = "SELECT * FROM data_user WHERE username = '".$_SESSION['username']."'";
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$username = $data['username'];
	$nama = $data['nama'];

?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form action="post_request.php?module=request_akta&act=tambah" method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN KELAHIRAN</div>
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
													<input type="text" name="keperluan" class="form-control" placeholder="Keperluan Anda..." required>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan KTP Ayah</label>
													<input type="file" name="scan_ktp_ayah" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KTP Ibu</label>
													<input type="file" name="scan_ktp_ibu" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Surat Nikah</label>
													<input type="file" name="scan_suratnikah" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KK</label>
													<input type="file" name="scan_kk" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Surat Kelahiran</label>
													<input type="file" name="scan_surat_kelahiran" class="form-control" size="37" required>
												</div>
								
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="kirim" type="submit" class="btn btn-success">Kirim</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>