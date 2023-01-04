<?php 
include '../../koneksi.php';
//created note
$nama      = $_POST['nama'];
$link      = $_POST['link'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$created   = date("Y-m-d H:i:s");
$user      = $_POST['user'];
$pemulihan = $_POST['pemulihan'];
$user      = $_POST['user'];
$id      = $_POST['id'];

//validasi
if ($nama                            == "") { //jika title kosong
	header("location:../../to/bookmark.php?pesan =title");	
}else if ($email                       == "") { //jika content kosong
	header("location:../../to/bookmark.php?pesan =body");
}else if ($password              == "") { ////jika folder kosong
	header("location:../../to/bookmark.php?pesan=bookmark");
}else { //jika sudah valid -> proses update
	mysqli_query($koneksi, "UPDATE bookmark SET nama ='$nama',link='$link',email='$email',password='$password',created='$created',user='$user',pemulihan='$pemulihan' WHERE id='$id'");
	header("location:../../to/bookmark.php?pesan=update");
}
?>