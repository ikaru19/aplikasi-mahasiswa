<?php
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
	<td width="1136" bgcolor="#7FFF00"><div align="center"><span class="header">APLIKASI DATA BUKU INDUK SISWA<br><br></span>
	<b>University of</b><span class="header"><br></span></div></td>
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
			<li><a href="home-user.php?page=form-edit-data-siswa&nim=<?=$_SESSION['username']?>" title="edit-data-mahasiswa">&nbsp;Edit Data Anda</a></li>
			<li><a href="home-user.php?page=lihat-nilai-siswa" title="lihat-data-mahasiswa">&nbsp;Lihat Nilai Data</a></li>
		</ul></td>
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
	<td rowspan="4" valign="top"><table width="1136" height="400" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="936" valign="top">
			<?php
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			switch ($page) {
				case 'form-input-data-mahasiswa' : include "form-input-data-mahasiswa.php"; break;
				case 'form-lihat-data-mahasiswa' : include "form-lihat-data-mahasiswa.php"; break;
				case 'form-input-mapel' : include "form-input-mapel.php"; break;
				case 'form-input-nilai' : include "form-input-nilai.php"; break;
				case 'form-edit-data-siswa' : include "form-edit-data-siswa.php"; break;
				case 'form-detail-data-siswa' : include "form-detail-data-siswa.php?nim=".$_SESSION['username']; break;
				case 'input-data-mahasiswa' : include "input-data-mahasiswa.php"; break;
				case 'input-mapel' : include "input-mapel.php"; break;
				case 'input-nilai' : include "input-nilai.php"; break;
				case 'lihat-nilai-siswa' : include "form-lihat-data-nilai.php"; break;
                case 'delete-data-siswa' : include "delete-data-siswa.php"; break;
                
				case 'main' :
				default : include 'aboutuser.php';	
			}
			?></td>	
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
</html>