<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
if(isset($_GET['id_request_skd'])){
    $id=$_GET['id_request_skd'];
	$tampil_username = "SELECT * FROM data_request_skd NATURAL JOIN data_user WHERE id_request_skd=$id";
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$username = $data['username'];
	$nik = $data['nik'];
	$id = $data['id_request_skd'];
    $nama = $data['nama'];
    $tgl = $data['tanggal_request'];
    $format1 = date('d-m-Y',strtotime($tgl));
    $ktp = $data['scan_ktp'];
    $kk = $data['scan_kk'];
    $sn = $data['scan_suratnikah'];
    $skck = $data['skck'];
    $pf = $data['pas_foto'];
    
	$keperluan = $data['keperluan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH DATA REQUEST SURAT KETERANGAN DOMISILI</div>
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
													<label>Scan KTP</label><br>
													<img src="../dataFoto/scan_ktp/<?=$ktp;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="kk" class="form-control" size="37">
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
													<label>Scan Surat Nikah</label><br>
													<img src="../dataFoto/scan_suratnikah/<?=$sn;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="sn" class="form-control" size="37">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan SKCK</label><br>
													<img src="../dataFoto/skck/<?=$skck;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="skck" class="form-control" size="37">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Pas Foto</label><br>
													<img src="../dataFoto/pas_foto/<?=$pf;?>" width="200" height="100" alt="">
												</div>
												<div class="form-group">
													<input type="file" name="pf" class="form-control" size="37">
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
	$nama_ktp = isset($_FILES['ktp']);
	$file_ktp = $_POST['username']."_".".jpg";
	$nama_kk = isset($_FILES['kk']);
    $file_kk = $_POST['username']."_".".jpg";
    $nama_sn = isset($_FILES['sn']);
    $file_sn = $_POST['username']."_".".jpg";
    $nama_skck = isset($_FILES['skck']);
    $file_skck = $_POST['username']."_".".jpg";
    $nama_pf = isset($_FILES['pf']);
    $file_pf = $_POST['username']."_".".jpg";
   
	$keperluan = $_POST['keperluan'];

	$sql = "UPDATE data_request_skd SET 
	scan_ktp='$file_ktp',
	scan_kk='$file_kk',
    scan_suratnikah = '$file_sn',
    pas_foto = '$file_pf',
    
	keperluan ='$keperluan' 
	WHERE id_request_skd=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
		copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
        copy($_FILES['sn']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
        copy($_FILES['skck']['tmp_name'],"../dataFoto/skck/".$file_skck);
        copy($_FILES['pf']['tmp_name'],"../dataFoto/pas_foto/".$file_pf);
        


		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skd">';
	  }
}
	
?>