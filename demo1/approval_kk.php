<table id="add3" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    
													<th>Scan Surat Nikah</th>
													<th>Scan Akta Lahir</th>

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
                                                    $sql = "SELECT * FROM data_request_kk where ".implode(" and ", $where);

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
														$username = $data['username'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$sn = $data['scan_suratnikah'];
														$akta_lahir = $data['akta_lahir'];
														$keperluan = $data['keperluan'];
														$id_request_kk = $data['id_request_kk'];
														

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
													<td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
													<td><?php echo $keperluan;?></td>
													<td width="200px">
														<center>
															
															<a class="btn btn-success btn-sm" href="approval_aksi.php?halaman=approval&page=kk&id=<?php echo $data['id_request_kk'] ?>&status=approve">Approve</a>
															<a class="btn btn-danger btn-sm" href="approval_aksi.php?halaman=approval&page=kk&id=<?php echo $data['id_request_kk'] ?>&status=decline">Decline</a>
														</center>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
											</tbody>
										</table>