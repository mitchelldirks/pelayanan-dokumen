<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
if(isset($_GET['id_request_akta'])){
    $id=$_GET['id_request_akta'];
	$tampil_username = "SELECT * FROM data_request_akta NATURAL JOIN data_user WHERE id_request_akta=$id";
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$username = $data['username'];
	$nik = $data['nik'];
	$id = $data['id_request_akta'];
    $nama = $data['nama'];
    $tgl = $data['tanggal_request'];
    $format1 = date('d-m-Y',strtotime($tgl));
    $ktp1 = $data['scan_ktp_ayah'];
	$ktp2 = $data['scan_ktp_ibu'];
	$sn = $data['scan_suratnikah'];
	$kk = $data['scan_kk'];
    $sk = $data['scan_surat_kelahiran'];
    
	$keperluan = $data['keperluan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH DATA REQUEST SURAT KETERANGAN KELAHIRAN</div>
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
													<label>Scan KTP Ayah</label><br>
													<img src="../dataFoto/scan_ktp/<?=$ktp1;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="ktp1" class="form-control" size="37">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan KTP Ibu</label><br>
													<img src="../dataFoto/scan_ktp/<?=$ktp2;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="ktp2" class="form-control" size="37">
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
                                            <div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan KK</label><br>
													<img src="../dataFoto/scan_kk/<?=$kk;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="kk" class="form-control" size="37">
												</div>
											</div>
											
												
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan Surat Kelahiran</label><br>
													<img src="../dataFoto/scan_surat_kelahiran/<?=$sk;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="sk" class="form-control" size="37">
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
	$nama_ktp1 = isset($_FILES['scan_ktp']);
	$file_ktp1 = $_POST['username']."_".".jpg";
	$nama_ktp2 = isset($_FILES['scan_ktp']);
	$file_ktp2 = $_POST['username']."_".".jpg";
	$nama_sn = isset($_FILES['scan_suratnikah']);
    $file_sn = $_POST['username']."_".".jpg";
	$nama_kk = isset($_FILES['scan_kk']);
    $file_kk = $_POST['username']."_".".jpg";
    
    $nama_sk = isset($_FILES['scan_surat_kelahiran']);
    $file_sk = $_POST['username']."_".".jpg"; 
    
	$keperluan = $_POST['keperluan'];

	$sql = "UPDATE data_request_akta SET 
	scan_ktp_ayah='$file_ktp1',
	scan_ktp_ibu='$file_ktp2',
	scan_suratnikah = '$file_sn',
	scan_kk='$file_kk',
    
    scan_surat_kelahiran = '$file_sk',
    
	keperluan ='$keperluan' 
	WHERE id_request_akta=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		copy($_FILES['scan_ktp_ayah']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp1);
        copy($_FILES['scan_ktp_ibu']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp2);
        copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
		copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
		
		copy($_FILES['scan_surat_kelahiran']['tmp_name'],"../dataFoto/scan_surat_kelahiran/".$file_sk);
        


		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_akta">';
	  }
}
	
?>