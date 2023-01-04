<?php 
include '../../koneksi.php';

//variabel
$judul         = $_POST['judul'];
$created       = date("Y-m-d H:i:s");
$user       = $_POST['user'];

// validasi
if ($judul == "") { 	//jika title kosong
	header("location:../../to/doc.php?pesan=title");	
}else { //jika sudah valid -> proses simpan data
	mysqli_query($koneksi, "INSERT INTO  dok_kategori (judul, created, user) VALUES('$judul','$created','$user')");
	header("location:../../to/doc.php?pesan=input");
}
?>