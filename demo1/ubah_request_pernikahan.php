<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
if(isset($_GET['id_request_pernikahan'])){
    $id=$_GET['id_request_pernikahan'];
	$tampil_username = "SELECT * FROM data_request_pernikahan NATURAL JOIN data_user WHERE id_request_pernikahan=$id";
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$username = $data['username'];
	$nik = $data['nik'];
	$id = $data['id_request_pernikahan'];
    $nama = $data['nama'];
    $tgl = $data['tanggal_request'];
    $format1 = date('d-m-Y',strtotime($tgl));
    $akta_lahir = $data['akta_lahir'];
	$ijazah = $data['ijazah'];
	$sn = $data['scan_suratnikah'];
    
	$keperluan = $data['keperluan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH DATA REQUEST SURAT PENGANTAR PERNIKAHAN</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
                                                <div class="form-group">
													<label>Username</label>
													<input type="text" name="username" class="form-control" value="<?= $username.' - '.$nama;?>" readonly>
												</div>
											</div>
											
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
													<label>Keperluan</label>
													<input type="text" name="keperluan" class="form-control" value="<?= $keperluan;?>">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan Akta Lahir</label><br>
													<img src="../dataFoto/akta_lahir/<?=$akta_lahir;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="akta_lahir" class="form-control" size="37">
												</div>
											</div>
                                            <div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan Ijazah</label><br>
													<img src="../dataFoto/ijazah/<?=$ijazah;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="ijazah" class="form-control" size="37">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan Surat Nikah</label><br>
													<img src="../dataFoto/scan_suratnikah/<?=$sn;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="sn" class="form-control" size="37">
												</div>
											</div>
											
											
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$nama_akta = isset($_FILES['akta_lahir']);
	$file_akta = $_POST['username']."_".".jpg";
	$nama_ijazah = isset($_FILES['ijazah']);
    $file_ijazah = $_POST['username']."_".".jpg";
    $nama_sn = isset($_FILES['scan_suratnikah']);
    $file_sn = $_POST['username']."_".".jpg";
   
	$keperluan = $_POST['keperluan'];

	$sql = "UPDATE data_request_pernikahan SET 
	scan_akta='$file_akta',
	scan_ijazah='$file_ijazah',
    scan_suratnikah = '$file_sn',
   
    
	keperluan ='$keperluan' 
	WHERE id_request_pernikahan=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		

        copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
		copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
		copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);


		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_pernikahan">';
	  }
}
	
?>