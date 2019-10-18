<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
	<?php //fungsi kode otomatis
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$ichsanasu = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($ichsanasu, $db) or die("Database tidak bisa dibuka");
		function kdauto($tabel, $inisial){
		$struktur   = mysqli_query($ichsanasu,"SELECT * FROM data_siswa");
		$field      = mysqli_field_name($ichsanasu,$struktur,0);
		$panjang    = mysqli_field_len($ichsanasu,$struktur,0);
		$qry  = mysqli_query($ichsanasu,"SELECT max(".$field.") FROM data_siswa");
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

		return 1233233;
		}
		$min_tanggal=mysqli_fetch_array(mysqli_query($ichsanasu,"select min(tgl_lahir) as min_tanggal from data_siswa"));
		$max_tanggal=mysqli_fetch_array(mysqli_query($ichsanasu,"select max(tgl_lahir) as max_tanggal from data_siswa"));
	?>
	<form action="home-admin.php?page=input-data-mahasiswa" method="POST" name="form-input-data-mahasiswa" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="2"><b>FORM INPUT DATA MAHASISWA</b></font></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIM</td>
				<td><input name="nim" type="text" id="nim" size="15" value=""/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Siswa</td>
				<td><input type="text" name="nama_siswa" size="50" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Kelamin</td>
				<td><select name="jk">
						<option value="-">-Pilihan-
						<option value="Laki-laki">Laki-laki
						<option value="Perempuan">Perempuan
					</select></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Foto</td>
				<td><input type="file" name="foto" size="40"/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jurusan</td>
				<td><select name="jurusan">
						<option value="-">-Pilihan-
						<option value="T-Komputer">Teknik Komputer
						<option value="T-Informatika">Teknik Informatika
						<option value="T-Mesin">Teknik Mesin
						<option value="T-Industri">Teknik Industri
						<option value="T-Elektro">Teknik Elektro
					</select></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tempat Lahir</td>
				<td><input type="text" name="tmp_lahir" size="40" maxlength="25" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Lahir</td>
				<td><select name="tgl_lahir">
					<?php
						for ($i=1; $i<=31; $i++) {
							$tg = ($i<10) ? "0$i" : $i;
							echo "<option value='$tg'>$tg</option>";	
						}
					?>
					</select> -
					<select name="bln_lahir">
					<?php
						for($bln=1;$bln<=12;$bln++){
							$nama_bln = array (1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Okt","Nov","Des");
							echo "<option value=$bln>$nama_bln[$bln]</option>";
						}
					?>
					</select> - 
					<select name="thn_lahir">
					<?php
						for ($i=1970; $i<=2000; $i++) {
							echo "<option value='$i'>$i</option>";	
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td height="62">&nbsp;</td>
				<td>Alamat</td>
				<td><textarea name="alamat" rows="2" cols="40" maxlength="50"></textarea></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Ibu Kandung</td>
				<td><input type="text" name="nama_ibu" size="40" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Email</td>
				<td><input type="text" name="email" size="40" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>No. HP</td>
				<td><input type="text" name="hp" size="20" maxlength="12" /></td>
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