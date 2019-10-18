<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
<h2 align="center"><font color="orange" size="4" face="arial"><b>Data Siswa</b></font></h2><br>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600" height="42">
	<th width="5">No</td>&nbsp;
	<th width="60">NIM</td>&nbsp;
	<th width="160">Nama Siswa</td>&nbsp;
	<th width="60">Jenis Kelamin</td>&nbsp;      
	<th width="60">Foto</td>&nbsp;
	<th width="60">Jurusan</td>&nbsp;
	<th width="130">Action</td>&nbsp;     
</tr>
<?php
	$Open = mysqli_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
	$Cari="SELECT * FROM data_siswa ORDER BY nim";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array ($Tampil)) {
			$nim 		= stripslashes ($hasil['nim']);
			$nama_siswa	= stripslashes ($hasil['nama_siswa']);
			$jk			= stripslashes ($hasil['jk']);
			$foto 		= $hasil['foto'];
			$jurusan	= stripslashes ($hasil['jurusan']);
		{
	$nomer++;
?>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr align="center" height="130">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim?><div align="center"></div></td>
		<td><?=$nama_siswa?><div align="center"></div></td>
		<td><?=$jk?><div align="center"></div></td>
		<td><?php
				if (empty($foto)) 
					echo "<strong><img src='foto/nopic.gif' width='110' height='130'> <br> No Image </strong>";
					else
					echo "<img class='shadow' src='foto/$foto' width='110' height='130' title='$nama_siswa' >";
					?><div align="center"></div></td>
		<td><?=$jurusan?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=lihat-nilai-siswa&nim=<?=$nim?>">Lihat Nilai</a> | <a href="home-admin.php?page=form-detail-data-siswa&nim=<?=$nim?>">Detail</a> | <a href="home-admin.php?page=form-edit-data-siswa&nim=<?=$nim?>">Edit</a> | <a href="home-admin.php?page=delete-data-siswa&nim=<?=$nim?>">Delete</a></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td> 
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