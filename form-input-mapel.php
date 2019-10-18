<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
	<?php //fungsi kode otomatis
		include "koneksi.php";
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$hose = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
		function RandomString()
		{
			$ID = "MAPEL".rand(0,1000);
			return $ID;
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
				<td><input name="id_mapel" type="text" id="id_mapel" size="15" readonly value="<?=RandomString()?>" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Mata Pelajaran</td>
				<td><input type="text" name="nama_mapel" size="50" maxlength="30" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Guru</td>
				<td><?php
					mysqli_connect($host,$username,$password) or die("Koneksi gagal");
					mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
					$result = mysqli_query($hose,"SELECT * FROM dosen");    
					$jsArray = "var nama_mapel = new Array();\n";    
					echo '<select name="guru_mapel" onchange="changeValue(this.value)">';    
					echo '<option> -- Pilih Mapel -- </option>';    
					while ($row = mysqli_fetch_array($result)) {    
						echo '<option value="' . $row['NIP'] . '">' . $row['Nama_dosen'] .'</option>';
						}    
					echo '</select>';
					?></td>
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