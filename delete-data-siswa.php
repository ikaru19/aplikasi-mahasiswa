<?php
$Open = mysqli_connect("localhost","root","");
	if (!$Open){
	die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
$Koneksi = mysqli_select_db("mahasiswa");
	if (!$Koneksi){
	die ("Koneksi ke Database Gagal !");
	}
// Cek Kode
if (isset($_GET['nim'])) {
	$nim = $_GET['nim'];
	$query   = "SELECT * FROM data_siswa WHERE nim='$nim'";
	$hasil   = mysqli_query($query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada NIM yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($nim) && $nim != "") {
		$hapus = "DELETE FROM data_siswa WHERE nim='$nim'";
		$sql = mysqli_query ($hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data siswa Berhasil dihapus');
				document.location='home-admin.php?page=form-lihat-data-mahasiswa';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Siswa gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>