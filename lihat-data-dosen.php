<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; height:375px;">
<h2 align="center"><font color="orange" size="4" face="arial"><b>Data Siswa</b></font></h2><br>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600" height="42">
	<th width="5">No</td>&nbsp;
	<th width="60">NIP</td>&nbsp;
	<th width="160">Nama Dosen</td>&nbsp;
	<th width="130">Action</td>&nbsp;     
</tr>
<?php
	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
	$Cari="SELECT * FROM dosen ORDER BY NIP";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array ($Tampil)) {
			$nim 		= stripslashes ($hasil['NIP']);
			$nama_siswa	= stripslashes ($hasil['Nama_dosen']);
			
		{
	$nomer++;
?>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr align="center" height="50">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim?><div align="center"></div></td>
		<td><?=$nama_siswa?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=form-detail-data-siswa&nim=<?=$nim?>">Detail</a> | <a href="home-admin.php?page=form-edit-data-siswa&nim=<?=$nim?>">Edit</a> | <a href="home-admin.php?page=delete-data-siswa&nim=<?=$nim?>">Delete</a></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td> 
		<td>&nbsp;</td>
	</tr>
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>