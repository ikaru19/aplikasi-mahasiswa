<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:375px;">
<h2 align="center"><font color="orange" size="4" face="arial"><b>Data Siswa</b></font></h2><br>
<table width="" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600" height="42">
	<th width="5">No</td>&nbsp;
	<th width="60">NIM Siswa</td>&nbsp;
	<th width="160">Nama Siswa</td>&nbsp;
	<th width="60">Mata Kuliah</td>&nbsp;      
	<th width="60">Nilai </td>&nbsp;    
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

	$Cari="SELECT * FROM nilai INNER JOIN data_siswa ON nilai.nim_siswa=data_siswa.nim WHERE nim_siswa =  
	'" .$_SESSION["username"]."'";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array($Tampil)) {
			$id_nilai		= stripslashes ($hasil['id_nilai']);
			$nim_siswa	= stripslashes ($hasil['nim_siswa']);
			$nama =stripslashes ($hasil['nama_siswa']);
			$mapel			= stripslashes ($hasil['mapel']);
			$nilai_mapel	= stripslashes ($hasil['nilai_mapel']);
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
		<td><?=$nim_siswa?><div align="center"></div></td>
		<td><?=$nama?><div align="center"></div></td>
		<td><?=$mapel?><div align="center"></div></td>
		<td><?=$nilai_mapel?><div align="center"></div></td>
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