<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
	<?php //fungsi kode otomatis
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$hose = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
		function kdauto($tabel, $inisial){
		$struktur   = mysqli_query($hose , "SELECT * FROM $tabel");
		$field      = mysqli_field_name($struktur,0);
		$panjang    = mysqli_field_len($struktur,0);
		$qry  = mysqli_query($hose , "SELECT max(".$field.") FROM ".$tabel);
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
	<form action="home-admin.php?page=input-nilai" method="POST" name="form-input-nilai" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM INPUT NILAI</b></font></td>
			</tr>
			<tr>
				<td width="5%" height="36">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>ID</td>
				<td><input name="id_nilai" type="text" id="id_nilai" size="15" value=""  />
					</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIM Siswa</td>
				<td><?php
					mysqli_connect($host,$username,$password) or die("Koneksi gagal");
					mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
					$result = mysqli_query($hose,"SELECT * FROM data_siswa");    
					$jsArray = "var nim_siswa = new Array();\n";    
					echo '<select name="nim_siswa" onchange="changeValue(this.value)">';    
					echo '<option> -- Pilih NIM -- </option>';    
					while ($row = mysqli_fetch_array($result)) {    
						echo '<option value="' . $row['nim'] . '">' . $row['nim'] . ' - ' . $row['nama_siswa'] .'</option>';
						}    
					echo '</select>';
					?>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Mata Pelajaran</td>
				<td><?php
					mysqli_connect($host,$username,$password) or die("Koneksi gagal");
					mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
					$result = mysqli_query($hose,"SELECT * FROM mapel");    
					$jsArray = "var nama_mapel = new Array();\n";    
					echo '<select name="mapel" onchange="changeValue(this.value)">';    
					echo '<option> -- Pilih Mapel -- </option>';    
					while ($row = mysqli_fetch_array($result)) {    
						echo '<option value="' . $row['nama_mapel'] . '">' . $row['nama_mapel'] .'</option>';
						}    
					echo '</select>';
					?>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nilai</td>
				<td><input type="text" name="nilai_mapel" id="nilai_mapel" size="7" maxlength="4">&nbsp; *Harus di Isi</td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;
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