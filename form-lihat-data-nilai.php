<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
	<th width="5">No</td>&nbsp;
	<th width="60">NIM Siswa</td>&nbsp;
	<th width="160">Nama Siswa</td>&nbsp;
	<th width="60">Mata Kuliah</td>&nbsp;      
	<th width="60">Nilai </td>&nbsp;    
	</tr>
</thead>
</div>
</div>


<?php

	$NIM_DATA = 0;
	if(isset($_GET['nim'])){
		$NIM_DATA = $_GET['nim'];
	}else{
		$NIM_DATA = $_SESSION["username"];
	}

	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}

	$Cari="SELECT * FROM nilai INNER JOIN data_siswa ON nilai.nim_siswa=data_siswa.nim WHERE nim_siswa =  
	'" .$NIM_DATA."'";
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

	<tr align="center" height="130">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim_siswa?><div align="center"></div></td>
		<td><?=$nama?><div align="center"></div></td>
		<td><?=$mapel?><div align="center"></div></td>
		<td><?=$nilai_mapel?><div align="center"></div></td>
		</tr>
	
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>