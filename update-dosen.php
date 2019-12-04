<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">

<?php
//cek button
include 'koneksi.php';
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nip		= $_POST['nip'];
	$nama_dosen	= $_POST['nama_dosen'];
//Cek Foto

//validasi data jika kosong
	if (empty($_POST['nama_dosen'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-edit-data-dosen&NIP='$nip;
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows (mysqli_query($Open,"SELECT NIP FROM dosen WHERE NIP='$_POST[nip]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('NIP sudah dipakai !, silahkan diulang kembali');
		document.location='home-admin.php?page=form-edit-data-dosen&NIP='$nip;
		</script>
<?php
}
//Masukan data ke Table Login
$input	="UPDATE dosen SET 
nama_dosen = '$nama_dosen'
WHERE NIP = '$nip';";
$query_input = mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses

		
?>
		<script language="JavaScript">
		alert('Data Dosen Berhasil diinput');
		document.location='home-admin.php?page=lihat-data-dosen';
		</script>
<?php
	
} else{

//Jika Gagal
			echo $input;
}	
}
	
//Tutup koneksi engine MySQL
	mysqli_close($Open);
	}

?>
</div>