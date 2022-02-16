<?php 
session_start();
include('../konek.php');

if($_GET['module'] == 'request_akta'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		$keperluan = $_POST['keperluan'];

		$nama_ktp1 = isset($_FILES['scan_ktp_ayah']);
		$file_ktp1 = $_POST['username']."_".".jpg";

		$nama_ktp2 = isset($_FILES['scan_ktp_ibu']);
		$file_ktp2 = $_POST['username']."_".".jpg";

		$nama_sn = isset($_FILES['scan_suratnikah']);
	    $file_sn = $_POST['username']."_".".jpg";

		$nama_kk = isset($_FILES['scan_kk']);
	    $file_kk = $_POST['username']."_".".jpg";
	    
	    $nama_sk = isset($_FILES['scan_surat_kelahiran']);
	    $file_sk = $_POST['username']."_".".jpg"; 
	    
		$sql = "INSERT INTO data_request_akta (username,nama,scan_ktp_ayah,scan_ktp_ibu,scan_suratnikah,scan_kk,scan_surat_kelahiran,keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp1','$file_ktp2','$file_sn','$file_kk','$file_sk','$keperluan')";
		$query = mysqli_query($konek, $sql) or die (mysqli_error());

		if($query){
			copy($_FILES['scan_ktp_ayah']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp1);
	        copy($_FILES['scan_ktp_ibu']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp2);
	        copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
			copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
			copy($_FILES['scan_surat_kelahiran']['tmp_name'],"../dataFoto/scan_surat_kelahiran/".$file_sk);

			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request gagal!');</script>" ;
			header('Location: main.php?halaman=request_akta');
		}
	}

}else if($_GET['module'] == 'request_kematian'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		
		$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['scan_ktp']);
		$file_ktp = $_POST['username']."_".".jpg";
		$nama_kk = isset($_FILES['scan_kk']);
		$file_kk = $_POST['username']."_".".jpg";
		$nama_ktp1= isset($_FILES['ktp1']);
	    $file_ktp1 = $_POST['username']."_".".jpg";
	    $nama_ktp2 = isset($_FILES['ktp2']);
	    $file_ktp2 = $_POST['username']."_".".jpg";
	   
		$sql = "INSERT INTO data_request_kematian (username,nama,scan_ktp,scan_kk,scan_ktp1,scan_ktp2,keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp','$file_kk','$file_ktp1','$file_ktp2','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['scan_ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
			copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
			copy($_FILES['scan_ktp1']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp1);
			copy($_FILES['scan_ktp2']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp2);
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request gagal!');</script>" ;
			header('Location: main.php?halaman=request_kematian');
		}
	}

}else if($_GET['module'] == 'request_kk'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		$keperluan = $_POST['keperluan'];
		$nama_sn= isset($_FILES['sn']);
		$file_sn = $_POST['username']."_".".jpg";
		$nama_akta = isset($_FILES['akta_lahir']);
		$file_akta = $_POST['username']."_".".jpg";
		$sql = "INSERT INTO data_request_kk(username,nama,tanggal_request,scan_suratnikah,akta_lahir,keperluan) VALUES ('$username','".$_SESSION['nama']."','".date('Y-m-d')."','$file_sn','$file_akta','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['sn']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
			copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
			
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_kk');
		}
	}

}else if($_GET['module'] == 'request_ktp'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['ktp']);
		$file_ktp = $_POST['username']."_".".jpg";
		$nama_kk = isset($_FILES['kk']);
    	$file_kk = $_POST['username']."_".".jpg";
        $nama_akta = isset($_FILES['akta']);
        $file_akta = $_POST['username']."_".".jpg";
        
		$sql = "INSERT INTO data_request_ktp (username,nama,scan_ktp,scan_kk,akta_lahir,keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp','$file_kk','$file_akta','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
			copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
	        copy($_FILES['akta']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
	       
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_ktp');
		}
	}

}else if($_GET['module'] == 'request_pernikahan'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		$keperluan = $_POST['keperluan'];
		$nama_akta = isset($_FILES['akta_lahir']);
		$file_akta = $_POST['username']."_".".jpg";
		$nama_ijazah = isset($_FILES['ijazah']);
	    $file_ijazah = $_POST['username']."_".".jpg";
	    $nama_sn = isset($_FILES['scan_suratnikah']);
	    $file_sn = $_POST['username']."_".".jpg";
	   
		$sql = "INSERT INTO data_request_pernikahan (username,nama,akta_lahir,ijazah,scan_suratnikah,keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_akta','$file_ijazah','$file_sn','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
			copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
			copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
			
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_pernikahan');
		}
	}

}else if($_GET['module'] == 'request_skck'){
	if($_GET['act'] == 'tambah'){

		$username = $_POST['username'];
		$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['scan_ktp']);
		$file_ktp = $username."_".".jpg";
		$nama_kk = isset($_FILES['scan_kk']);
    	$file_kk = $username."_".".jpg";

    	$nama_akta = isset($_FILES['akta_lahir']);
    	$file_akta = $username."_".".jpg";

        $nama_ijazah = isset($_FILES['ijazah']);
    	$file_ijazah = $username."_".".jpg";
    	
        $nama_pf = isset($_FILES['pf']);
    	$file_pf = $username."_".".jpg";
    
		$sql = "INSERT INTO data_request_skck (username,nama,scan_ktp,scan_kk,akta_lahir,ijazah, pas_foto, keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp','$file_kk', '$file_akta','$file_ijazah','$file_pf','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['scan_ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
			copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
        	copy($_FILES['akta_lahir']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
        	copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
        	copy($_FILES['pf']['tmp_name'],"../dataFoto/pas_foto/".$file_pf);

			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
	  	}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_skck');
	  	}
	}

}else if($_GET['module'] == 'request_skd'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
		
		$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['scan_ktp']);
		$file_ktp = $_POST['username']."_".".jpg";
		$nama_kk = isset($_FILES['scan_kk']);
	    $file_kk = $_POST['username']."_".".jpg";
	    $nama_sn = isset($_FILES['scan_suratnikah']);
	    $file_sn = $_POST['username']."_".".jpg";
	    $nama_pf = isset($_FILES['pas_foto']);
	    $file_pf = $_POST['username']."_".".jpg"; // 'nik'
	    
	    $nama_skck = isset($_FILES['skck']);
	    $file_skck = $_POST['username']."_".".jpg";
		$sql = "INSERT INTO data_request_skd (username,nama,scan_ktp,scan_kk,scan_suratnikah,pas_foto,skck,keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp','$file_kk','$file_sn','$file_pf','$file_skck','$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['scan_ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
			copy($_FILES['scan_kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
			copy($_FILES['scan_suratnikah']['tmp_name'],"../dataFoto/scan_suratnikah/".$file_sn);
			copy($_FILES['pas_foto']['tmp_name'],"../dataFoto/pas_foto/".$file_pf);
	        copy($_FILES['skck']['tmp_name'],"../dataFoto/skck/".$file_skck);

			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_skd');
		}
	}

}else if($_GET['module'] == 'request_sku'){
	if($_GET['act'] == 'tambah'){
		$username = $_POST['username'];
	
		$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['ktp']);
		$file_ktp = $_POST['username']."_".".jpg";
		$nama_kk = isset($_FILES['kk']);
    	$file_kk = $_POST['username']."_".".jpg";
       
        $nama_akta = isset($_FILES['akta']);
        $file_akta = $_POST['username']."_".".jpg";
        $nama_ijazah = isset($_FILES['ijazah']);
        $file_ijazah = $_POST['username']."_".".jpg";
        $nama_surathilang = isset($_FILES['surathilang']);
        $file_surathilang = $_POST['username']."_".".jpg";

		$sql = "INSERT INTO data_request_sku (username,nama,scan_ktp,scan_kk,akta_lahir,ijazah,surathilang,     keperluan) VALUES ('$username','".$_SESSION['nama']."','$file_ktp','$file_kk','$file_akta','$file_ijazah','$file_surathilang' ,'$keperluan')";
		$query = mysqli_query($konek,$sql) or die (mysqli_error());

		if($query){
			copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
			copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
	        
	        copy($_FILES['akta']['tmp_name'],"../dataFoto/akta_lahir/".$file_akta);
	        copy($_FILES['ijazah']['tmp_name'],"../dataFoto/ijazah/".$file_ijazah);
	        copy($_FILES['surathilang']['tmp_name'],"../dataFoto/surathilang/".$file_surathilang);


			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=tampil_status');
		}else{
			echo "<script language='javascript'>alert('Request berhasil!');</script>" ;
			header('Location: main.php?halaman=request_sku');
		}
	}
}

?>