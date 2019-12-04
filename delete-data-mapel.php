<?php
$Open = mysqli_connect("localhost:3306","root","");
	if (!$Open){
	die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
$Koneksi = mysqli_select_db($Open,"mahasiswa");
	if (!$Koneksi){
	die ("Koneksi ke Database Gagal !");
	}
// Cek Kode
if (isset($_GET['id'])) {
	$nim = $_GET['id'];
	$query   = "SELECT * FROM mapel WHERE id_mapel='$nim'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada NIM yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($nim) && $nim != "") {
		$hapus = "DELETE FROM mapel WHERE id_mapel='$nim'";
		$sql = mysqli_query ($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data siswa Berhasil dihapus');
				document.location='home-admin.php?page=form-lihat-data-mapel';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Mata Kuliah gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>