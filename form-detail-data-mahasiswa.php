<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>	<?php //fungsi kode otomatis
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$Open = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
        mysqli_select_db($Open, $db) or die("Database tidak bisa dibuka");
        
        $NIM_DATA = 0;
        if($nim = $_GET['nim'] != null){
            $NIM_DATA = $_GET['nim'];
        }else{
            $NIM_DATA = $_SESSION["username"];
        }
    
        $Cari="SELECT * FROM data_siswa WHERE nim ='" .$NIM_DATA."'";
        
        $Tampil = mysqli_query($Open,$Cari);

        function RandomString()
		{
			$ID = "RPM".rand(0,1000);
			return $ID;
		}

        while (	$hasil = mysqli_fetch_array($Tampil)) {
                $nim		= stripslashes ($hasil['nim']);
                $nama_siswa	= stripslashes ($hasil['nama_siswa']);
                $nama_ibu	= stripslashes ($hasil['nama_ibu']);
                $jk			= stripslashes ($hasil['jk']);
                $jurusan	= stripslashes ($hasil['jurusan']);
                $tmp_lahir	= stripslashes ($hasil['tmp_lahir']);
                $tgl_lahir  = stripslashes ($hasil['tgl_lahir']);
                $alamat	    = stripslashes ($hasil['alamat']);
                $email	    = stripslashes ($hasil['email']);
                $hp	    = stripslashes ($hasil['hp']);
            {
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
				<td><font size="2"><b>BIODATA MAHASISWA</b></font></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIM</td>
				<td><?=$nim?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Siswa</td>
				<td><?=$nama_siswa?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Kelamin</td>
				<td><?=$jk?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jurusan</td>
				<td><?=$jurusan?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tempat Lahir</td>
				<td><?=$tmp_lahir?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Lahir</td>
				<td><?=$tgl_lahir?></td>
			</tr>
			<tr>
				<td height="62">&nbsp;</td>
				<td>Alamat</td>
				<td><?=$alamat?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Ibu Kandung</td>
				<td><?=$nama_ibu?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Email</td>
				<td><?=$email?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>No. HP</td>
				<td><?=$hp?></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
        <?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
	</form>
</div>
</div>