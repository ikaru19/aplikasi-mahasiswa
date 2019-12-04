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
if (isset($_GET['NIP'])) {
	$nip = $_GET['NIP'];
	$query   = "SELECT * FROM dosen WHERE NIP='$nip'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada NIP yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
	if (!empty($nip) && $nip != "") {
		$hapus = "DELETE FROM dosen WHERE NIP='$nip'";
		$hapus2 = "DELETE FROM login WHERE username='$nip'";
		$sql = mysqli_query ($Open,$hapus);
		$sql2 = mysqli_query ($Open,$hapus2);
		if ($sql && $sql2) {		
			?>
				<script language="JavaScript">
				alert('Data dosen Berhasil dihapus');
				document.location='home-admin.php?page=lihat-data-dosen';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Dosen gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>