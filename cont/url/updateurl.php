<?php 
include '../../koneksi.php';
//created note
$nama      = $_POST['nama'];
$link      = $_POST['link'];
$created   = date("Y-m-d H:i:s");
$user      = $_POST['user'];
$id      = $_POST['id'];

//validasi
if ($nama                            == "") { //jika title kosong
	header("location:../../to/url.php?pesan =title");	
}else if ($link                       == "") { //jika content kosong
	header("location:../../to/url.php?pesan =body");
}else if ($id              == "") { ////jika folder kosong
	header("location:../../to/url.php?pesan=bookmark");
}else { //jika sudah valid -> proses update
	mysqli_query($koneksi, "UPDATE url SET nama ='$nama',link='$link',created='$created',user='$user' WHERE id='$id'");
	header("location:../../to/url.php?pesan=update");
}
?>