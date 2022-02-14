<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
<?php
if(isset($_GET['id_request_skck'])){
    $id=$_GET['id_request_skck'];
	$tampil_username = "SELECT * FROM data_request_skck NATURAL JOIN data_user WHERE id_request_skck=$id";
	$query = mysqli_query($konek,$tampil_username);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $id=$data['id_request_skck'];
    $username =$data['username'];
	$nik = $data['nik'];
    $nama = $data['nama'];
    $ktp = $data['scan_ktp'];
    $kk = $data['scan_kk'];
    $akta_lahir = $data['akta_lahir'];
	$ijazah = $data['ijazah'];
	$pasfoto = $data['pas_foto'];
    $keperluan = $data['keperluan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH REQUEST SURAT KETERANGAN SKCK</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
                                                <div class="form-group">
													<label>Username</label>
													<input type="text" name="username" class="form-control" value="<?= $username.' - '.$nama;?>" readonly>
												</div>
												<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value="<?= $s2;?>" readonly>
												</div> -->
												<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value=<?= $date;?> required>
												</div> -->
												<div class="form-group">
													<label>Keperluan</label>
													<input type="text" name="keperluan" class="form-control" value="<?= $keperluan?>" placeholder="Keperluan Anda.." autofocus>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">	
                                                <div class="form-group">
													<label>Scan KTP</label><br>
                                                    <img src="../dataFoto/scan_ktp/<?= $ktp;?>" width="200" height="100" alt="">
    
												</div>	
												<div class="form-group">
													<input type="file" name="ktp" class="form-control" size="37">
												</div>
												<div class="form-group">
													<label>Scan KK</label><br>
													<img src="../dataFoto/scan_kk/<?= $kk;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="kk" class="form-control" size="37">
												</div>

                                                
												<div class="form-group">
													<label>Scan Akta Lahir</label><br>
													<img src="../dataFoto/akta_lahir/<?= $akta_lahir;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="akta_lahir" class="form-control" size="37">
												</div>
                                                <div class="form-group">
													<label>Scan Ijazah</label><br>
													<img src="../dataFoto/ijazah/<?= $ijazah;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="ijazah" class="form-control" size="37">
												</div>   

                                                <div class="form-group">
													<label>Pas Foto</label><br>
													<img src="../dataFoto/pas_foto/<?= $pasfoto;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="pas_foto" class="form-control" size="37">
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
	$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['ktp']);
		$file_ktp = $_POST['username']."_".".jpg";
		$nama_kk = isset($_FILES['kk']);
    	$file_kk = $_POST['username']."_".".jpg";
        $nama_akta = isset($_FILES['akta_lahir']);
    	$file_akta = $_POST['username']."_".".jpg";
    	$nama_ijazah= isset($_FILES['ijazah']);
    	$file_ijazah = $_POST['username']."_".".jpg";
   
    	$nama_pf = isset($_FILES['pasfoto']);
    	$file_pf = $_POST['username']."_".".jpg";




    $sql = "UPDATE data_request_skck SET
    keperluan='$keperluan',
    scan_ktp='$file_ktp',
    scan_kk='$file_kk',
    akta_lahir='$file_akta',
    ijazah = '$file_ijazah',
    pas_foto = '$file_pf' WHERE id_request_skck=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
		copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
        copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
        copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
        copy($_FILES['pas_foto']['tmp_name'],"../dataFoto/pas_foto/".$file_pf);


		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_skck">';
	  }
}
	
?>