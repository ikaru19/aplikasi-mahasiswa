<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
<?php
include "koneksi.php";
//cek button
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nip	= $_POST['nip'];
	$nama_dosen	= $_POST['nama_dosen'];

//validasi data jika kosong
	if (empty($_POST['nama_dosen'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-input-data-dosen';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//Masukan data ke Table
$input	="INSERT INTO dosen(NIP, nama_dosen) VALUES ('$nip','$nama_dosen')";
$input2	="INSERT INTO login (username, nama , password , hak_akses ) VALUES ('$nip','$nama_dosen','$nip','Dosen')";
$query_input =mysqli_query($Open,$input);
$query_input2 =mysqli_query($Open,$input2);
	if ($query_input) {
	//Jika Sukses
?>
		<script language="JavaScript">
		alert('Data Berhasil diinput');
		document.location='home-admin.php?page=form-input-data-dosen';
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