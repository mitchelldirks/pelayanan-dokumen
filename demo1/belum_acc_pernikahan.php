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
										<h4 class="fw-bold text-uppercase">BELUM ACC REQUEST SURAT PENGANTAR PERNIKAHAN</h4>
									</div>
								</div>
								<div class="card-body">
									<form action="" method="POST">
										<div class="table-responsive">
											<table id="add1" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>Tanggal Request</th>
														<th>Username</th>
														<th>NIK</th>
														<th>Hak Akses</th>
														<th>Nama </th>
														<th>Status</th>
														<th>Akta Lahir</th>
                                                        <th>Ijazah</th>
                                                        <th>Scan Surat Nikah Orang Tua</th>
														
														<th>Keterangan</th>
														<th style="width: 10%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$sql = "SELECT * FROM data_request_pernikahan natural join data_user where status=1";
														$query = mysqli_query($konek,$sql);
														while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
															$tgl = $data['tanggal_request'];
															$format = date('d F Y', strtotime($tgl));
															$username = $data['username'];
															$nik = $data['nik'];
															$hak_akses = $data['hak_akses'];
															$nama = $data['nama'];
															$status = $data['status'];
															$id= $data['id_request_pernikahan'];
													
															$akta_lahir = $data['akta_lahir'];
															$ijazah = $data['ijazah'];
															$sn = $data['scan_suratnikah'];
															
															$keterangan = $data['keterangan'];
															$id_request_pernikahan = $data['id_request_pernikahan'];
	
															if($status=="1"){
																$status = "Sudah ACC Ketua RT";
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
														<td class="fw-bold text-uppercase text-success op-8"><?php echo $status;?></td>
														<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/ijazah/<?php echo $ijazah;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>

														<td><i><?php echo $keterangan;?></i></td>
														<!-- <td>
															<input type="checkbox" name="check[$i]" value="<?php echo $id;?>">
															<input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Lihat Surat" href="?halaman=detail_skck&id_request_skck=<?= $id_request_skck;?>">
																<i class="fa fa-edit"></i></a>
															</div>
														</td> -->
														<td>
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Surat" href="?halaman=view_pernikahan&id_request_pernikahan=<?= $id_request_pernikahan;?>">
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