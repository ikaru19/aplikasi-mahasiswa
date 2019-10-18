<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
<?php
include "koneksi.php";
//cek button

if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$id_nilai	= $_POST['id_nilai'];
	$nim_siswa	= $_POST['nim_siswa'];
	$mapel = $_POST['mapel'];
	$nilai = $_POST['nilai_mapel'];
//validasi data jika kosong
	if (empty($_POST['nilai_mapel'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-input-nilai';
	</script>
	
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
		//Masukan data ke Table
		$input	="INSERT INTO nilai (id_nilai, nim_siswa, mapel, nilai_mapel) VALUES ('$id_nilai','$nim_siswa','$mapel','$nilai')";
		$query_input =mysqli_query($Open,$input);
			if ($query_input) {
			//Jika Sukses
		?>
		<script language="JavaScript">
		alert('Data Berhasil diinput');
		document.location='home-admin.php?page=form-input-nilai';
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

}else{
}

?>
</div>