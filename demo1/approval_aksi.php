<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php include '../konek.php';
session_start();
$updated_data = array();
if ($_SESSION['hak_akses']=='rt') {
	$updated_data['approve_rt'] = $_GET['status'] == 'approve' ? 1 : 0;
	$updated_data['approve_rt_date'] = date("Y-m-d H:i:s");
}elseif ($_SESSION['hak_akses']=='rw') {
	$updated_data['approve_rw'] = $_GET['status'] == 'approve' ? 1 : 0;
	$updated_data['approve_rw_date'] = date("Y-m-d H:i:s");
	$updated_data['status'] = 'selesai';

}else{
	echo "<script language='javascript'>swal('Gagal...', 'Anda tidak memiliki akses', 'error');</script>" ;
	echo '<meta http-equiv="refresh" content="3; url=?halaman='.$_GET['halaman'].'&page='.$_GET['page'].'">';
}

if (count($updated_data) > 0) {
	$items = array();
	foreach ($updated_data as $key => $value) {
		$items[]=$key." = '".$value."' ";
	}

	$update = mysqli_query($konek,"UPDATE data_request_".$_GET['page']." set ".implode(",",$items)." where id_request_".$_GET['page']." = '".$_GET['id']."'");
	if ($update) {
		echo "<script language='javascript'>swal('Sukses', 'Approval berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=main.php?halaman='.$_GET['halaman'].'&page='.$_GET['page'].'">';
	}else{
		echo "<script language='javascript'>swal('Gagal', 'Approval gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=main.php?halaman='.$_GET['halaman'].'&page='.$_GET['page'].'">';
	}
}

?>