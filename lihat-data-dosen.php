<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
<tr>
	<th width="5">No</td>&nbsp;
	<th width="60">NIP</td>&nbsp;
	<th width="160">Nama Dosen</td>&nbsp;
	<th width="130">Action</td>&nbsp;     
	</tr>
</thead>
</div>
</div>
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
	
	<tr align="center" height="50">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim?><div align="center"></div></td>
		<td><?=$nama_siswa?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center"><a href="home-admin.php?page=form-detail-data-siswa&nim=<?=$nim?>">Detail</a> | <a href="home-admin.php?page=form-edit-data-siswa&nim=<?=$nim?>">Edit</a> | <a href="home-admin.php?page=delete-data-siswa&nim=<?=$nim?>">Delete</a></div></td>
	</tr>
	
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>