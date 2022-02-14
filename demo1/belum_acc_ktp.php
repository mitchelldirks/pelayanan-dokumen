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
									<h4 class="fw-bold text-uppercase">belum acc request surat pengantar KTP</h4>
									</div>
								</div>
								<form action="" method="POST">
									<div class="card-body">
										<div class="table-responsive">
											<table id="add1" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>Tanggal Request</th>
														<th>Username</th>
														<th>NIK</th>
														<th>Nama </th>
														<th>Hak Akses</th>
														<th>Status</th>
														<th>Scan KTP</th>
														<th>Scan KK</th>
														<th>Scan Akta Lahir</th>
                                                       
                                                    
														<th style="width: 10%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$sql = "SELECT * FROM data_request_ktp natural join data_user where status=1";
														$query = mysqli_query($konek,$sql);
														while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
															$tgl = $data['tanggal_request'];
															$format = date('d F Y h:i:s', strtotime($tgl));
															$username = $data['username'];
															$nik = $data['nik'];
															
															$nama = $data['nama'];
															$hak_akses = $data['hak_akses'];
															$status = $data['status'];
															$id= $data['id_request_ktp'];
															$ktp = $data['scan_ktp'];
															$kk = $data['scan_kk'];
															$akta_lahir = $data['akta_lahir'];


															$id_request_ktp = $data['id_request_ktp'];
	
															if($status=="1"){
																$status = "SUDAH ACC KETUA RT";
															}elseif($status=="0"){
																$status = "BELUM ACC";
															}
													?>
													<tr>
														<td><?php echo $format;?></td>
														<td><?php echo $username;?></td>
														<td><?php echo $nik;?></td>
														
														<td><?php echo $nama;?></td>
														<td><?php echo $hak_akses;?></td>
														<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
														<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
														<!-- <td>
															<input type="checkbox" name="check[$i]" value="<?php echo $id;?>">
															<input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
														</td> -->
														<td>
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Surat" href="?halaman=view_ktp&id_request_ktp=<?= $id_request_ktp;?>">
																<i class="fa fa-edit"></i></a>
															</div>
														</td>
													</tr>
													<?php
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
                        </div>
                        
					</div>
				</div>

<?php
    if(isset($_POST['acc'])){
        if(isset($_POST['check']))
        {
                    foreach ($_POST['check'] as $value){
                        // echo $value;
                        $ubah = "UPDATE data_request_ktp set status =2 where id_request_ktp = $value"; 

                        $query = mysqli_query($konek,$ubah);

                        if($query) {
                            echo "<script language='javascript'>swal('Selamat...', 'ACC Berhasil!', 'success');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_ktp">';
                        }else{
                            echo "<script language='javascript'>swal('Gagal...', 'ACC Gagal!', 'error');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_ktp">';
                        }

                    }
        }
    }
?>