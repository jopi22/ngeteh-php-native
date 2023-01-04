<?php 
include '../../koneksi.php';

//created note
$nama         = $_POST['nama'];
$created       = date("Y-m-d H:i:s");
$kategori       = $_POST['kategori'];
$link       = $_POST['link'];
$user       = $_POST['user'];

// validasi
if ($nama == "") { 	//jika title kosong
	header("location:../../to/url.php?pesan=title");	
}else { //jika sudah valid -> proses simpan data
	mysqli_query($koneksi, "INSERT INTO  url (nama, link, created, user) VALUES('$nama','$link','$created','$user')");
	header("location:../../to/url.php?pesan=input");
}

?>