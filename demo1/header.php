<?php include '../konek.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard Pelayanan Pengurusan Dokumen Online RW 024</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">

			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="#" class="logo">
					<img src="../main/img/GBJ2.png" width="125" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>

			</div>

			<!-- End Logo Header -->

			<!-- Navbar Header -->

			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

               <!-- id hasil -->

    <div id="tampil">
         </div>

         <style> h2 { color : whitesmoke; }     </style>
         <h2> PELAYANAN DOKUMEN ONLINE RW 024 </h2>
 
        
                 <!--?php
                        if (function_exists('date_default_timezone_set'))
                            date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <span id="clock">&nbsp;</span>
                    </a>
                </li>
         
   
    <!--script>
    	 
        var date = new Date();
        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        
        switch(hari) {
        case 0: hari = "Minggu"; break;
        case 1: hari = "Senin"; break;
        case 2: hari = "Selasa"; break;
        case 3: hari = "Rabu"; break;
        case 4: hari = "Kamis"; break;
        case 5: hari = "Jum'at"; break;
        case 6: hari = "Sabtu"; break;
}
        switch(bulan) {
        case 0: bulan = "Januari"; break;
        case 1: bulan = "Februari"; break;
        case 2: bulan = "Maret"; break;
        case 3: bulan = "April"; break;
        case 4: bulan = "Mei"; break;
        case 5: bulan = "Juni"; break;
        case 6: bulan = "Juli"; break;
        case 7: bulan = "Agustus"; break;
        case 8: bulan = "September"; break;
        case 9: bulan = "Oktober"; break;
        case 10: bulan = "November"; break;
        case 11: bulan = "Desember"; break;
}
        var tampilTanggal = "Tanggal: " + hari + ", " + tanggal + " " + bulan + " " + tahun ;     
            
       
        document.getElementById("tampil").innerHTML = tampilTanggal; 
       </script>

	
	
	
	<div id="waktu"></div>
	<script >
	var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();

        var waktujam = "waktu : " + jam" : "+ menit +":"+detik;
        document.getElementById("waktu").innerHTML = waktujam;
    </script--!>

	<!-- <div class="container-fluid">
	<div class="collapse" id="search-nav">
	<form class="navbar-left navbar-form nav-search mr-md-3">
	<div class="input-group">
	<div class="input-group-prepend">
	<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
			</button>
			</div>
			<input type="text" placeholder="Search ..." class="form-control">
			</div>
			</form>
			</div>
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
			<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
			<i class="fa fa-search"></i>
							</a>
						</li>
					</ul>
				</div> -->
			</nav>
			<!-- End Navbar -->
		</div>
	

