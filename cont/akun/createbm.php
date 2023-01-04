<?php 
include '../../koneksi.php';

//created
$nama      = $_POST['nama'];
$link      = $_POST['link'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$created   = date("Y-m-d H:i:s");
$user      = $_POST['user'];
$pemulihan = $_POST['pemulihan'];
$user      = $_POST['user'];

// validasi
if ($nama                            == "") { 	//jika title kosong
	header("location:../../to/bookmark.php?pesan =title");	
}else if ($email                       == "") {	//jika content kosong
	header("location:../../to/bookmark.php?pesan =body");
}else if ($password              == "") {	//jika folder kosong
	header("location:../../to/bookmark.php?pesan =note");
}else { //jika sudah valid -> proses create
	mysqli_query($koneksi, "insert into bookmark (nama, link, email, password, created, user, pemulihan) values('$nama','$link','$email','$password','$created','$user','$pemulihan')");
	header("location:../../to/bookmark.php?pesan =input");
}
?>