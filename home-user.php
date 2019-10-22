<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut
}
//cek level user
if($_SESSION['hak_akses']!="Siswa"){
    die("Anda bukan Siswa");//jika bukan admin jangan lanjut
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Program Aplikasi Data Mahasiswa</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
	<div class="sidebar-brand-icon rotate-n-15">
	  <i class="fas fa-laugh-wink"></i>
	</div>
	<div class="sidebar-brand-text mx-3">SIAKAD TERBAEK <sup>COK</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
	<a class="nav-link" href="home-user.php">
	  <i class="fas fa-fw fa-tachometer-alt"></i>
	  <span>Biodata Mahasiswa</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Tables -->
  <li class="nav-item">
	<a class="nav-link" href="home-user.php?page=lihat-nilai-siswa">
	  <i class="fas fa-fw fa-table"></i>
	  <span>&nbsp;Nilai Mahasiswa</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	  <!-- Sidebar Toggle (Topbar) -->
	  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	  </button>

	  <!-- Topbar Search -->
	  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
		  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		  <div class="input-group-append">
			<button class="btn btn-primary" type="button">
			  <i class="fas fa-search fa-sm"></i>
			</button>
		  </div>
		</div>
	  </form>

	  <!-- Topbar Navbar -->
	  <ul class="navbar-nav ml-auto">

		<!-- Nav Item - Search Dropdown (Visible Only XS) -->
		<li class="nav-item dropdown no-arrow d-sm-none">
		  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-search fa-fw"></i>
		  </a>
		  <!-- Dropdown - Messages -->
		  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
			<form class="form-inline mr-auto w-100 navbar-search">
			  <div class="input-group">
				<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
				  <button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				  </button>
				</div>
			  </div>
			</form>
		  </div>
		</li>

		
		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
		  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small">&nbsp;<?php echo $_SESSION['username'];?></span>
			<img class="img-profile rounded-circle" src="data:image/jpeg;base64,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">
		  </a>
		  <!-- Dropdown - User Information -->
		  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="home-user.php">
			  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
			  Profile
			</a>
			
			<a class="dropdown-item" href="index.php" 	>
			  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			  Logout
			</a>
		  </div>
		</li>

	  </ul>

	</nav>
	<!-- End of Topbar -->

	<!-- Begin Page Content -->
	<div class="container-fluid">
	<?php
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			switch ($page) {
				case 'form-input-data-mahasiswa' : include "form-input-data-mahasiswa.php"; break;
				case 'form-lihat-data-mahasiswa' : include "form-lihat-data-mahasiswa.php"; break;
				case 'form-input-mapel' : include "form-input-mapel.php"; break;
				case 'form-input-nilai' : include "form-input-nilai.php"; break;
				case 'form-edit-data-siswa' : include "form-detail-data-mahasiswa.php"; break;
				case 'form-detail-data-siswa' : include "form-detail-data-siswa.php?nim=".$_SESSION['username']; break;
				case 'input-data-mahasiswa' : include "input-data-mahasiswa.php"; break;
				case 'input-mapel' : include "input-mapel.php"; break;
				case 'input-nilai' : include "input-nilai.php"; break;
				case 'lihat-nilai-siswa' : include "form-lihat-data-nilai.php"; break;
                case 'delete-data-siswa' : include "delete-data-siswa.php"; break;
                
				case 'main' :
				default : include 'aboutuser.php';	
			}
			?>
	<!-- /.container-fluid -->

  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
	<div class="container my-auto">
	  <div class="copyright text-center my-auto">
		<span>Copyright &copy; Your Website 2019</span>
	  </div>
	</div>
  </footer>
  <!-- End of Footer -->

<!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	</div>
	<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	<div class="modal-footer">
	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	  <a class="btn btn-primary" href="login.html">Logout</a>
	</div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>






<!-- <?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut
}
//cek level user
if($_SESSION['hak_akses']!="Siswa"){
    die("Anda bukan Admin");//jika bukan admin jangan lanjut
}
?>
<html>
<head>
<title>Program Aplikasi Data Mahasiswa</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
ul.navbar {
    list-style-type: none;
    padding: 0;
    margin: 0;
    position: relative;
    top: 0.5em;
    left: 1em;
    width: 11em;
}
ul.navbar li {
    background: #E6E6FA;
    margin: 0.5em 0;
    padding: 0.3em;
    border-right: 0.5em solid #9932CC;
}
ul.navbar a {
    text-decoration: none;
}
h1 {
    font-family: Helvetica, Geneva, Arial, Sans-Regular, sans-serif
}
address {
    margin-top: 1em;
    padding-top: 1em;
    border-top: thin dotted
}
	a:link,a:visited,a:active {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	text-decoration: none;
}
a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: blue;
	text-decoration: none;
}
</style>
</head>
<body>
<br>
<table width="1306" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td width="10" bgcolor="#7FFF00">&nbsp;</td>
	<td width="140" height="120" bgcolor="#7FFF00"><div align="center"><img src="image/logo.png" width="100" height="90"></div></td>
	<td width="10" bgcolor="#7FFF00">&nbsp;</td>
	<td width="1136" bgcolor="#7FFF00"><div align="center"><span class="header">SIAKAD TERBAGUS<br><br></span>
	<b>University of AshiDICKy</b><span class="header"><br></span></div></td>
	<td width="10" bgcolor="#7FFF00"></td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>&nbsp;</td>
	<td height="27"><div align="left"><strong><?php echo "Tanggal : ".date("d-M-y");?></strong></div></td>
	<td>&nbsp;</td>
	<td align="right">Selamat Datang&nbsp;<font color="#FF6600"><strong> <?=$_SESSION['nama']?></strong></font>&nbsp;|&nbsp;<a href="logout.php">Log Out >>&nbsp;&nbsp;</a></td>
	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>&nbsp;</td>
	<td rowspan="4" valign="top"><table width="144" height="400" bgcolor="#7FFF00" border="0" cellspacing="0" cellpadding="0" align="top">
		<tr>
		<td valign="top"><ul class="navbar">
			<li><b>MAIN MENU</b></li><br>
			<li><a href="home-user.php?page=form-edit-data-siswa&nim=<?=$_SESSION['username']?>" title="edit-data-mahasiswa">&nbsp;Biodata Mahasiswa</a></li>
			<li><a href="home-user.php?page=lihat-nilai-siswa" title="lihat-data-mahasiswa">&nbsp;Nilai Mahasiswa</a></li>
		</ul></td>
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
	<td rowspan="4" valign="top"><table width="1136" height="400" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="936" valign="top">
			</td>	
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
</tr>
<tr bgcolor="#7FFF00">
	<td height="36" colspan="5" bgcolor="#7FFF00"><div align="right" style="margin:0 10px 0 0;"><font color="#000">Development 2015 | by Raja Putra Media</font><br></div></td>
</tr>
</table>
<div align="center"></div>
</body>
</html> -->