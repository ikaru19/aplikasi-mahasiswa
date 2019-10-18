<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
<?php
include "koneksi.php";
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$id_mapel	= $_POST['id_mapel'];
	$nama_mapel	= $_POST['nama_mapel'];
	$guru_mapel	= $_POST['guru_mapel'];

//validasi data jika kosong
	if (empty($_POST['nama_mapel'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-input-mapel';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//Masukan data ke Table
$input	="INSERT INTO mapel (id_mapel, nama_mapel, guru_mapel) VALUES ('$id_mapel','$nama_mapel','$guru_mapel')";
$query_input =mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Berhasil diinput');
		document.location='home-admin.php?page=form-input-mapel';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
	}
}
?>
</div>