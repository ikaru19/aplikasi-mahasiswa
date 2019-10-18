<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
	<?php //fungsi kode otomatis
		include "koneksi.php";
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$hose = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
		function kdauto($tabel, $inisial){
		$struktur   = mysqli_query($hose,"SELECT * FROM $tabel");
		$field      = mysqli_field_name($struktur,0);
		$panjang    = mysqli_field_len($struktur,0);
		$qry  = mysqli_query($hose,"SELECT max(".$field.") FROM ".$tabel);
		$row  = mysqli_fetch_array($qry);
		if ($row[0]=="") {
		$angka=0;
		}
		else {
		$angka= substr($row[0], strlen($inisial));
		}
		$angka++;
		$angka      =strval($angka);
		$tmp  ="";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
		}
	?>
	<form action="home-admin.php?page=input-mapel" method="POST" name="form-input-mapel" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="2"><b>FORM INPUT MATA PELAJARAN</b></font></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>ID</td>
				<td><input name="id_mapel" type="text" id="id_mapel" size="15" value="" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Mata Pelajaran</td>
				<td><input type="text" name="nama_mapel" size="50" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Guru</td>
				<td><input type="text" name="guru_mapel" size="50" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
</div>