<?php include '../konek.php';?>
<?php
	if(isset($_GET['id_request_skd'])){
		$id=$_GET['id_request_skd'];
		$sql = "SELECT * FROM data_request_skd natural join data_user WHERE id_request_skd='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $username = $data['username'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		
		$status_warga = $data['status_warga'];
        $request = $data['request'];
        $keperluan = $data['keperluan'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK SKD</title>
</head>
<body>

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
                    <font size="4"><b>SURAT KETERANGAN DOMISILI</b></font><br>
                    <hr style="margin:0px" color="black">
                    <span>Nomor : 045.2 / <?php echo $id;?> / 29.07.05</span>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" align="center">
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Ketua RT 01 RW 024 Griya Bukit Jaya Kabupaten Bogor <br> Bogor, Menerangkan bahwa :
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
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td><?php echo $tempat.", ".$format2;?></td>
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
            <td>Keperluan</td>
            <td>:</td>
            <td><?php echo $keperluan;?></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <?php
                if($request=="DOMISILI"){
                    $request="Surat Keterangan Domisili";
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
            <th>Bogor, <?php echo date('d F Y',strtotime($acc));?>  </th>
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
            <td><b><u><img src="img/RT.png" width="50" height="67" alt=""><br>(SULISTYO)</u></b>
            <td></td>
            <td><b><u><img src="img/RW.png" width="50" height="67" alt="">(SUTIKMAN)</u></b></td>
        </tr>
    </table>



    
</body>
</html>
        <script>
            window.print();
        </script>