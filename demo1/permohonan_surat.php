
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
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN DOMISILI</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Scan Surat Nikah</th>
													<th>Scan SKCK</th>
													<th>Pas Foto</th>
													
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skd  ";
                                                    

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_skd=$data['id_request_skd'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));	
														$username = $data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$sn = $data['scan_suratnikah'];
                                                        $skck = $data['skck'];
                                                        $pf = $data['pas_foto'];
                                                        
														$keperluan = $data['keperluan'];
														$id_request_skd = $data['id_request_skd'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>ACC </b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                                                    
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/skck/<?php echo $skck;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/pas_foto/<?php echo $pf;?>" width="50" height="50" alt=""></td>
													
													
													<td><?php echo $keperluan;?></td>
                                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>

													<td>
														<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak"href="?halaman=view_cetak_skd&id_request_skd=<?=$id_request_skd;?>">
																	<i class="fa fa-edit"></i></a>
														</div>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                           
                                                <?php
				if(isset($_POST['kirim'])){
					$keterangan=$_POST['keterangan'];
					$sql = mysqli_query($konek, "UPDATE data_request_skd SET
					keterangan='$keterangan', status='3' WHERE id_request_skd='$id_request_skd'");
					  if($sql) {
						echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}else{
						echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}

				}
				?>
											</tbody>
										</table>
									</div>
								</div>


								</form>
							</div>
						</div> 


						
                        
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT PENGANTAR KTP</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add2" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                   
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Akta Lahir</th>

													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_ktp natural join data_user WHERE status=2";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));
														$username =$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$akta_lahir = $data['akta_lahir'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_ktp = $data['id_request_ktp'];

														if($status=="2"){
                                                            $status = "<b style='color:blue'>SUDAH ACC KETUA RW</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>

													
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td>
														<div class="form-button-action">
														<a href="?halaman=view_cetak_ktp&id_request_ktp=<?=$id_request_ktp;?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
																<i class="fa fa-edit"></i>
															</button>
														</a>
															
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
							</div>
                        </div>
                        
                        	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT PENGANTAR KK</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama </th>
													
													<th>Scan Surat Nikah</th>
													
													<th>Scan Akta Lahir</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_kk  natural join data_user WHERE status=1";
                                                    

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_kk=$data['id_request_kk'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));	
														$username=$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														
														
														$sn = $data['scan_suratnikah'];
                                                        $akta_lahir = $data['akta_lahir'];
                                                        
														$keperluan = $data['keperluan'];
														$id_request_kk = $data['id_request_kk'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>ACC </b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                                                    
													
												
												    <td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
													
													
													
													<td><?php echo $keperluan;?></td>
                                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>

													<td>
														<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak"href="?halaman=view_cetak_kk&id_request_kk=<?=$id_request_kk;?>">
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
							</div>
                        </div>
						
                       

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN SKCK </h4>
									</div>
								</div>
								<form method="POST">
								<div class="card-body">
									<div class="table-responsive">
										<table id="add4" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama </th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Akta Lahir</th>
													<th>Ijazah</th>
													<th>Pas Foto</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
											
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skck natural join data_user where status=2";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));
														$username=$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$akta_lahir = $data['akta_lahir'];
														$ijazah = $data['ijazah'];
														$pasfoto = $data['pas_foto'];


														$id_request_skck=$data['id_request_skck'];

                                                        if($status=="2"){
                                                            $status = "<b style='color:blue'>SUDAH ACC KETUA RW</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/akta_lahir/<?php echo $akta_lahir;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/ijazah/<?php echo $ijazah;?>" width="50" height="50" alt=""></td>
														<td><img src="../dataFoto/pas_foto/<?php echo $pasfoto;?>" width="50" height="50" alt=""></td>

													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td>
														<div class="form-button-action">
														<a href="?halaman=view_cetak_skck&id_request_skck=<?=$id_request_skck;?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
																<i class="fa fa-edit"></i>
															</button>
														</a>
															
														</div>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                                <?php
				if(isset($_POST['kirim'])){
					$keterangan=$_POST['keterangan'];
					$sql = mysqli_query($konek, "UPDATE data_request_skck SET
					keterangan='$keterangan', status='3' WHERE id_request_skck='$id_request_skck'");
					  if($sql) {
						echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}else{
						echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}

				}
				?>
											</tbody>
										</table>
									</div>
								</div>


								</form>
							</div>
						</div>

                            <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN KELAHIRAN</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama </th>
													<th>Scan KTP Ayah</th>
													<th>Scan KTP Ibu</th>
													<th>Scan Surat Nikah</th>
													<th>Scan KK </th>
													<th>Scan Surat Kelahiran</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_akta  natural join data_user WHERE status=1";
                                                    

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_akta=$data['id_request_akta'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));	
														$username=$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp1 = $data['scan_ktp_ayah'];
														$ktp2 = $data['scan_ktp_ibu'];
														$sn = $data['scan_suratnikah'];
														$kk = $data['scan_kk'];
														$sk = $data['scan_surat_kelahiran'];
                                                        
                                                        
														$keperluan = $data['keperluan'];
														$id_request_akta = $data['id_request_akta'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>ACC </b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                                                    <td><img src="../dataFoto/scan_ktp/<?php echo $ktp1;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp2;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_surat_kelahiran/<?php echo $sk;?>" width="50" height="50" alt=""></td>
													
													
													
													<td><?php echo $keperluan;?></td>
                                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>

													<td>
														<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak"href="?halaman=view_cetak_akta&id_request_akta=<?=$id_request_akta;?>">
																	<i class="fa fa-edit"></i></a>
														</div>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
											


				<?php
				if(isset($_POST['kirim'])){
					$keterangan=$_POST['keterangan'];
					$sql = mysqli_query($konek, "UPDATE data_request_akta SET
					keterangan='$keterangan', status='3' WHERE id_request_akta='$id_request_akta'");
					  if($sql) {
						echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}else{
						echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}

				}
				?>
											</tbody>
										</table>
									</div>
								</div>


								</form>
							</div>
						</div>
                        
                        <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT PENGANTAR PERNIKAHAN</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama </th>
													<th>Scan KTP Ayah</th>
													<th>Scan KTP Ibu</th>
													<th>Scan Surat Nikah</th>
													<th>Scan KK </th>
													<th>Scan Surat Kelahiran</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_pernikahan  natural join data_user WHERE status=1";
                                                    

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_pernikahan=$data['id_request_pernikahan'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));	
														$username=$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp1 = $data['scan_ktp_ayah'];
														$ktp2 = $data['scan_ktp_ibu'];
														$sn = $data['scan_suratnikah'];
														$kk = $data['scan_kk'];
														$sk = $data['scan_surat_kelahiran'];
                                                        
                                                        
														$keperluan = $data['keperluan'];
														$id_request_pernikahan = $data['id_request_pernikahan'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>ACC </b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                                                    <td><img src="../dataFoto/scan_ktp/<?php echo $ktp1;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp2;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_surat_kelahiran/<?php echo $sk;?>" width="50" height="50" alt=""></td>
													
													
													
													<td><?php echo $keperluan;?></td>
                                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>

													<td>
														<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak"href="?halaman=view_cetak_pernikahan&id_request_pernikahan=<?=$id_request_pernikahan;?>">
																	<i class="fa fa-edit"></i></a>
														</div>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
											


				<?php
				if(isset($_POST['kirim'])){
					$keterangan=$_POST['keterangan'];
					$sql = mysqli_query($konek, "UPDATE data_request_pernikahan SET
					keterangan='$keterangan', status='3' WHERE id_request_pernikahan='$id_request_pernikahan'");
					  if($sql) {
						echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}else{
						echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}

				}
				?>
											</tbody>
										</table>
									</div>
								</div>


								</form>
							</div>
						</div>
                    
                    <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN KEMATIAN</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal & Waktu Request</th>
                                                    <th>Username</th>
                                                    <th>NIK</th>
                                                    <th>Nama </th>
													<th>Scan KTP Ayah</th>
													<th>Scan KTP Ibu</th>
													<th>Scan Surat Nikah</th>
													<th>Scan KK </th>
													<th>Scan Surat Kelahiran</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_kematian  natural join data_user WHERE status=1";
                                                    

                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_kematian=$data['id_request_kematian'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y h:i:s', strtotime($tgl));	
														$username=$data['username'];
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp1 = $data['scan_ktp_ayah'];
														$ktp2 = $data['scan_ktp_ibu'];
														$sn = $data['scan_suratnikah'];
														$kk = $data['scan_kk'];
														
                                                        
                                                        
														$keperluan = $data['keperluan'];
														$id_request_kematian = $data['id_request_kematian'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:blue'>ACC </b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
                                                        }
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $username;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                                                    <td><img src="../dataFoto/scan_ktp/<?php echo $ktp1;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp2;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_suratnikah/<?php echo $sn;?>" width="50" height="50" alt=""></td>
												    <td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_surat_kelahiran/<?php echo $sk;?>" width="50" height="50" alt=""></td>
													
													
													
													<td><?php echo $keperluan;?></td>
                                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>

													<td>
														<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak"href="?halaman=view_cetak_kematian&id_request_kematian=<?=$id_request_kematian;?>">
																	<i class="fa fa-edit"></i></a>
														</div>
													</td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
											


				<?php
				if(isset($_POST['kirim'])){
					$keterangan=$_POST['keterangan'];
					$sql = mysqli_query($konek, "UPDATE data_request_kematian SET
					keterangan='$keterangan', status='3' WHERE id_request_kematian='$id_request_kematian'");
					  if($sql) {
						echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}else{
						echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>" ;
						echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
					}

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

				