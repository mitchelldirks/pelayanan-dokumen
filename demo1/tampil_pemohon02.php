<?php include '../konek.php';?>
<?php
    $tampil_username = "SELECT * FROM data_user_rt02 WHERE username =$_SESSION[username]";
	
	$query = mysqli_query($konek,$tampil_username);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $username = $data['username'];
    
	$nik = $data['nik'];
    $nama = $data['nama'];
    $tempat_lahir = $data['tempat_lahir'];
    $tanggal_lahir = $data['tanggal_lahir'];
    $format = date('d-m-Y',strtotime($tanggal_lahir));
    $jekel = $data['jekel'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];
    $agama = $data['agama'];
    $status_warga = $data['status_warga'];
    $warga = $data['warga'];

?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">BIODATA ANDA</h4>
                            <a href="?halaman=ubah_pemohon02&username=<?=$username;?>" class="btn btn-sm btn-warning btn-round ml-auto">
                                <i class="fa fa-edit"></i>
                                    Ubah Biodata
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td><?= $username;?></td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td><?= $nik;?></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                <td>:</td>
                                <td><?= $nama;?></td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td>:</td>
                                <td><?= $tempat_lahir.', '.$format;?></td>
                            </tr>

                            <tr>
                                <th>JEKEL</th>
                                <td>:</td>
                                <td><?= $jekel;?></td>
                            </tr>
                            <tr>
                                <th>AGAMA</th>
                                <td>:</td>
                                <td><?= $agama;?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td>:</td>
                                <td><?= $alamat;?></td>
                            </tr>
                            <tr>
                                <th>TELEPON</th>
                                <td>:</td>
                                <td><?= $telepon;?></td>
                            </tr>
                            <tr>
                                <th>STATUS WARGA</th>
                                <td>:</td>
                                <td><?= $status_warga;?></td>
                            </tr>
                            <tr>
                                <th>WARGA</th>
                                <td>:</td>
                                <td><?= $warga;?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>