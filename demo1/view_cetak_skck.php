<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_skck'])){
		$id=$_GET['id_request_skck'];
		$sql = "SELECT * FROM data_request_skck natural join data_user WHERE id_request_skck='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_skck'];
        $username = $data['username'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tanggal_lahir));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
        $keperluan = $data['keperluan'];
        $request = $data['request'];
        $keterangan = $data['keterangan'];
        $status = $data['status'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($format4==0){
            $format4="kosong";
        }elseif($format4==1){
           $format4;
        }

        if($status==3){
            $keterangan="Sudah ACC Ketua RW, surat sedang dalam proses cetak oleh Ketua RT";
        }
	}
?>
 <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"></h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
								    <div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                                <select name="dicetak" id="" class="form-control" required="">
                                                    <option value="">Pilih</option>
                                                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                                                </select><br>
                                                <!-- <input type="date" name="tgl_acc" class="form-control"> -->
                                                    <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                                                    <a href="cetak_skck.php?id_request_skck=<?=$id;?>" class="btn btn-primary btn-sm">Cetak</a>
                                                <!-- <div class="form-group">
                                                    <a href="cetak_skd.php?id_request_skd=<?php $id;?>">
                                                        Cetak
                                                    </a>
                                                </div> -->
                                                <!-- <div class="form-group">
                                                   <a href="cetak_skd.php?id_request_skd=<?=$id;?>">a</a>
                                                </div> -->
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $cetak = $_POST['dicetak'];
                                            $update = mysqli_query($konek,"UPDATE data_request_skck SET keterangan='$cetak', status=3 WHERE id_request_skck=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_skck">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skck">';
                                            }

                                        }
                                        ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
                                <table border="1" align="center">
                                    <table border="0" align="center">
                                        <tr>
                                        <td><img src="img/tegarberiman.png" width="70" height="87" alt=""></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                            <td>
                                                <center>
                                                    <font size="4">PEMERINTAHAN KABUPATEN BOGOR</font><br>
                                                    <font size="4">KECAMATAN GUNUNG PUTRI</font><br>
                                                    <font size="5"><b>KELURAHAN TLAJUNG UDIK</b></font><br>
                                                    <font size="2"><i>GRIYA BUKIT JAYA 16962</i></font><br>
                                                </center>
                                            </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="45"><hr color="black"></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                <center>
                                                    <font size="4"><b>SURAT KETERANGAN SKCK</b></font><br>
                                                    <hr style="margin:0px" color="black">
                                                    <span>Nomor : 043.3 / <?php echo $id;?> / <?php echo $tgl2 ;?></span>
                                    <span>
                                        <div id="qrcode"></div>
                                        <script type="text/javascript">
                                        var qrcode = new QRCode("qrcode", {
                                            text: "pelayanan-dokumen/demo1/main.php?halaman=view_cetak_skck&id_request_skck=<?php echo $id ?>",
                                            width: 100,
                                            height: 100,
                                            colorDark : "#000000",
                                            colorLight : "#ffffff",
                                            correctLevel : QRCode.CorrectLevel.H
                                        });
                                        </script>
                                    </span>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Ketua RW 024 Griya Bukit Jaya Kabupaten Bogor<br> Bogor, Menerangkan bahwa :
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $nama;?></td>
                                        </tr>
                                        <tr>
                                            <td>TTL</td>
                                            <td>:</td>
                                            <td><?php echo $tempat_lahir.", ".$format1;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?php echo $jekel;?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td><?php echo $agama;?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Warga</td>
                                            <td>:</td>
                                            <td><?php echo $status_warga;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. NIK</td>
                                            <td>:</td>
                                            <td><?php echo $nik;?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $alamat;?></td>
                                        </tr>
                                        <tr>
                                            <td>Domisili</td>
                                            <td>:</td>
                                            <td><?php echo @mysqli_fetch_array(mysqli_query($konek,"SELECT * from data_user where username = '".$data['username']."' "))['warga'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Keperluan</td>
                                            <td>:</td>
                                            <td><?php echo $keperluan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <?php 
                                                
                                                if($request=="SKCK"){
                                                    $request="Surat Keterangan SKCK";
                                                }
                                            
                                            ?>
                                            <td><?php echo $request;?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan<br>&nbsp;&nbsp;&nbsp;&nbsp;untuk sebagaimana mestinya.
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <th></th>
                                            <th width="100px"></th>
                                            <th>Bogor, <?php echo $acc;?></th>
                                        </tr>
                                        <tr>
                                            <td>Ketua RT 01</td>
                                            <td></td>
                                            <td>Ketua RW 024</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="15"></td>
                                            <td></td>
                                            <td rowspan="15"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                           <td><b><u><img src="img/RT.png" width="50" height="67" alt=""><br>(SULISTYO)</u></b></td>
                                            <td></td>
                                            <td><b><u><img src="img/RW.png" width="50" height="67" alt=""><br>(SUTIKMAN)</u></b></td>
                                        </tr>
                                    </table>
                                </table>

								</div>
							</div>
						</div>
					</div>
			</div>
            