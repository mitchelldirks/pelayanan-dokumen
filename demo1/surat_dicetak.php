<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
                <div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">PERMOHONAN SURAT SUDAH DICETAK</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Keperluan</th>
                                                    <th>Request</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_skck.tanggal_request,
                                                    data_request_skck.keperluan,
                                                    data_request_skck.request,
                                                    data_request_skck.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_skck ON data_request_skck.username = data_user.username
                                                WHERE data_request_skck.status = 3
                                                UNION
                                                SELECT
                                                data_user.username
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_skd.tanggal_request,
                                                    data_request_skd.keperluan,
                                                    data_request_skd.request,
                                                    data_request_skd.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_skd ON data_request_skd.username = data_user.username
                                                WHERE data_request_skd.status = 3
                                                UNION
                                                SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_ktp.tanggal_request,
                                                    data_request_ktp.keperluan,
                                                    data_request_ktp.request,
                                                    data_request_ktp.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_ktp ON data_request_ktp.username = data_user.username
                                                WHERE data_request_ktp.status = 3
                                                UNION
                                                SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_kk.tanggal_request,
                                                    data_request_kk.keperluan,
                                                    data_request_kk.request,
                                                    data_request_kk.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_kk ON data_request_kk.username = data_user.username
                                                WHERE data_request_kk.status = 3
                                                UNION
                                                SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_akta.tanggal_request,
                                                    data_request_akta.keperluan,
                                                    data_request_akta.request,
                                                    data_request_akta.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_akta ON data_request_akta.username = data_user.username
                                                WHERE data_request_akta.status = 3
                                                UNION
                                                SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_pernikahan.tanggal_request,
                                                    data_request_pernikahan.keperluan,
                                                    data_request_pernikahan.request,
                                                    data_request_pernikahan.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_pernikahan ON data_request_pernikahan.username = data_user.username
                                                WHERE data_request_pernikahan.status = 3
                                                UNION
                                                SELECT
                                                    data_user.username,
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request_kematian.tanggal_request,
                                                    data_request_kematian.keperluan,
                                                    data_request_kematian.request,
                                                    data_request_kematian.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request_kematian ON data_request_kematian.username = data_user.username
                                                WHERE data_request_kematian.status = 3



                                                ";
                                                    // $sql = "SELECT * FROM data_request_ktp natural join data_user WHERE status=3";
                                                    $query = mysqli_query($konek,$sql);
                                                    while ($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $username =$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];

														$keperluan = $data['keperluan'];
														// $keterangan = $data['keterangan'];
                                                        // $id= $data['id_request_skd'];
                                                        $request= $data['request'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>Sudah ACC Ketua RT</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC Ketua RT</b>";
                                                        }elseif($status=="3"){
                                                            $status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>

													<td><?php echo $keperluan;?></td>
                                                    <td><?php echo $request;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
                                                </tr>

												<!-- <?php
													if(isset($_GET['id_request_skck'])){
													$hapus = mysqli_query($konek,"DELETE FROM data_request_skck WHERE id_request_skck=$id");
													if($hapus){
																	echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
																	echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
																}else{
																	echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
																	echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
																}
															}
														?> -->
                                                <?php
                                                    }
                                                ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
                        </div>
					</div>
				</div>
