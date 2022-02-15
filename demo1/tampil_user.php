<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <?php if($_SESSION['hak_akses'] == 'admin' || $_SESSION['hak_akses'] == 'rw'){ ?>
                            <h4 class="card-title">Data User RT</h4>
                        <?php }else{ ?>
                            <h4 class="card-title">Data User <?php echo $_SESSION['warga']; ?></h4>
                        <?php } ?>
                            <a href="?halaman=tambah_user" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                    Add User
                            </a>
                    </div>
                </div>
                <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New
                                    </span> 
                                    <span class="fw-light">
                                        Row
                                    </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                                <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                    </div>
                                                    </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                        <label>Office</label>
                                                        <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="">
                                            <div class="table-responsive">
                                                <table id="add" class="display table table-striped table-hover" >
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>username</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Tempat Tanggal Lahir</th>
                                                            <th>Alamat</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Status Warga</th>
                                                            <th>Warga</th>
                                                            <th>Hak Akses</th>
                                                            <th style="width: 10%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            if($_SESSION['hak_akses'] == 'admin' || $_SESSION['hak_akses'] == 'rw'){
                                                                $query = mysqli_query($konek, "SELECT * FROM data_user");
                                                            }else{
                                                                $query = mysqli_query($konek, "SELECT * FROM data_user WHERE warga = '".$_SESSION['warga']."'");
                                                            }
                                                            while($data = mysqli_fetch_array($query)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no++;?></td>
                                                            <td><?php echo $data['username'];?></td>
                                                            <td><?php echo $data['nik'];?></td>
                                                            <td><?php echo $data['nama'];?></td>
                                                            <td><?php echo $data['tempat_lahir'].", ".date('d/m/Y', strtotime($data['tanggal_lahir']));?></td>
                                                            <td><?php echo $data['alamat'];?></td>
                                                            <td><?php echo $data['jekel'];?></td>
                                                            <td><?php echo $data['status_warga'];?></td>
                                                            <td><?php echo $data['warga'];?></td>
                                                            <td><?php echo $data['hak_akses'];?></td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a href="?halaman=ubah_user&username=<?php echo $data['username'];?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="?halaman=tampil_user&username=<?php echo $data['username'];?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus User">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
        </div>
</div>


<?php
    if(isset($_GET['username'])){
        $sql_hapus = "DELETE FROM data_user WHERE username='".$_GET['username']."'";
        $query_hapus = mysqli_query($konek,$sql_hapus);
        if($query_hapus){
            echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
          }else{
            echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
          }
    }
?>