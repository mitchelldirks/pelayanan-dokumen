<table id="add1" class="display table table-striped table-hover" >
												<thead>
													<tr>
														<th>Tanggal Request</th>
														<th>Username</th>
														<th>Nama </th>
														<th>Scan KTP</th>
														<th>Scan KK</th>
                                                        <th>Akta Lahir</th>
                                                        <th>Ijazah</th>
                                                        <th>Pas Foto</th>
														<th>Keperluan</th>
														<th style="width: 10%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$i=1;
														$where = array();
                                                if ($_SESSION['hak_akses']=='rt') {
                                                	$where[] = " approve_rt is null ";
                                                }elseif ($_SESSION['hak_akses']=='rw') {
                                                	$where[] = " approve_rt is not null ";
                                                	$where[] = " approve_rw is null ";
                                                }else{

                                                }
                                                    $sql = "SELECT * FROM data_request_skck where ".implode(" and ", $where);
														$query = mysqli_query($konek,$sql);
														while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
															$id_request_skck=$data['id_request_skck'];
															$tgl = $data['tanggal_request'];
															$format = date('d F Y', strtotime($tgl));
															$username = $data['username'];
															$nama = $data['nama'];
															$status = $data['status'];
															$ktp = $data['scan_ktp'];
															$kk = $data['scan_kk'];
															$akta_lahir = $data['akta_lahir'];
															$ijazah = $data['ijazah'];
															$pasfoto = $data['pas_foto'];
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
														<td><?php echo $nama;?></td>
														<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/ijazah/<?php echo $ijazah;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/pas_foto/<?php echo $pasfoto;?>" width="50" height="50" alt=""></td>
														<td><?php echo $keperluan;?></td>
														<td width="200px">
														<center>
															
															<a class="btn btn-success btn-sm" href="approval_aksi.php?halaman=approval&page=skck&id=<?php echo $data['id_request_skck'] ?>&status=approve">Approve</a>
															<a class="btn btn-danger btn-sm" href="approval_aksi.php?halaman=approval&page=skck&id=<?php echo $data['id_request_skck'] ?>&status=decline">Decline</a>
														</center>
													</td>
													</tr>
													<?php
														}
													?>
												</tbody>
											</table>