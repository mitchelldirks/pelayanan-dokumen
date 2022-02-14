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
										<h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST SURAT PENGANTAR PERNIKAHAN</h4>
									</div>
								</div>
									<div class="card-body">
									<form method="POST">
										<div class="table-responsive">
											<table id="add1" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>Tanggal Request</th>
														<th>Username</th>
														<th>NIK</th>
														<th>Nama </th>
														
                                                        <th>Akta Lahir</th>
                                                        <th>Ijazah</th>
                                                        <th>Scan Surat Nikah Orang Tua</th>
														<th>Keperluan</th>
														<th style="width: 10%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$i=1;
														$sql = "SELECT * FROM data_request_pernikahan natural join data_user WHERE status=0";
														$query = mysqli_query($konek,$sql);
														while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
															$id_request_pernikahan=$data['id_request_pernikahan'];
															$tgl = $data['tanggal_request'];
															$format = date('d F Y', strtotime($tgl));
															$username = $data['username'];
															$nik = $data['nik'];
															$nama = $data['nama'];
															$status = $data['status'];
															
															$akta_lahir = $data['akta_lahir'];
															$ijazah = $data['ijazah'];
															$sn = $data['scan_suratnikah'];
															$keperluan = $data['keperluan'];
															$keterangan = $data['keterangan'];

															if($status=="1"){
																$status = "<b style='color:blue'>ACC</b>";
															}elseif($status=="0"){
																$status = "<b style='color:red'>BELUM ACC</b>";
															}
													?>
													<tr>
														<td><?php echo $format;?></td>
														<td><?php echo $username;?></td>
														<td><?php echo $nik;?></td>
														<td><?php echo $nama;?></td>
														
														<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/ijazah/<?php echo $ijazah;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
														<td><?php echo $keperluan;?></td>
														<td>
															
															<input type="checkbox" name="check[$i]" value="<?php echo $id_request_pernikahan;?>">
															<input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cek Data" href="?halaman=detail_pernikahan&id_request_pernikahan=<?= $id_request_pernikahan;?>">
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
									</form>
									</div>
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
                        $ubah = "UPDATE data_request_pernikahan set status =1 where id_request_pernikahan = $value"; 

                        $query = mysqli_query($konek,$ubah);

                        if($query) {
                            echo "<script language='javascript'>swal('Selamat...', 'ACC Ketua RT Berhasil!', 'success');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_pernikahan">';
                        }else{
                            echo "<script language='javascript'>swal('Gagal...', 'ACC Ketua RT Gagal!', 'error');</script>" ;
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_pernikahan">';
                        }

                    }
        }
    }
?>