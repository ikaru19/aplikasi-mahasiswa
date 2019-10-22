<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>	<?php //fungsi kode otomatis
		$host = "localhost:3306";
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


		function RandomString()
		{
			$ID = "DOS".rand(0,1000);
			return $ID;
		}
		$min_tanggal=mysqli_fetch_array(mysqli_query($ichsanasu,"select min(tgl_lahir) as min_tanggal from data_siswa"));
		$max_tanggal=mysqli_fetch_array(mysqli_query($ichsanasu,"select max(tgl_lahir) as max_tanggal from data_siswa"));
	?>
	<form action="home-admin.php?page=input-dosen" method="POST" name="form-input-data-dosen" enctype="multipart/form-data">
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
				<td>NIP</td>
				<td><input name="nip" type="text" id="nim" size="15" value="<?=RandomString()?>"/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Dosen</td>
				<td><input type="text" name="nama_dosen" size="50" maxlength="30" /></td>
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