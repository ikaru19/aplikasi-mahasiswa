<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">

<?php
//cek button
include 'koneksi.php';
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$nim		= $_POST['nim'];
	$nama_siswa	= $_POST['nama_siswa'];
	$jk			= $_POST['jk'];
	$foto		= $_FILES['foto']['name'];
	$jurusan	= $_POST['jurusan'];
	$tmp_lahir	= $_POST['tmp_lahir'];
	$tgl_lahir	= $_POST['thn_lahir']."-".$_POST['bln_lahir']."-".$_POST['tgl_lahir'];
	$alamat		= $_POST['alamat'];
	$nama_ibu	= $_POST['nama_ibu'];
	$email		= $_POST['email'];
	$hp			= $_POST['hp'];
//Cek Foto
	if (strlen($foto)>0) {
		//upload foto
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "foto/".$foto);
		}
	}
//validasi data jika kosong
	if (empty($_POST['nama_siswa']) || empty($_POST['jurusan']) || empty($_POST['nama_ibu'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-edit-data-mahasiswa&nim='$nim;
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows (mysqli_query($Open,"SELECT nim FROM data_siswa WHERE nim='$_POST[nim]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('NIM sudah dipakai !, silahkan diulang kembali');
		document.location='home-admin.php?page=form-edit-data-mahasiswa&nim='$nim;
		</script>
<?php
}
//Masukan data ke Table Login
$input	="UPDATE data_siswa SET 
nama_siswa = '$nama_siswa', 
jk = '$jk', 
foto = '$foto', 
jurusan = '$jurusan', 
tmp_lahir = '$tmp_lahir',
tgl_lahir = '$tgl_lahir',
alamat = '$alamat', 
nama_ibu = '$nama_ibu',
email = '$email',
hp = '$hp' 
WHERE nim = '$nim';";
$query_input = mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses

		
?>
		<script language="JavaScript">
		alert('Data Siswa Berhasil diinput');
		document.location='home-admin.php?page=form-lihat-data-mahasiswa';
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