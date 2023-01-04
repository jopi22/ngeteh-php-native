<?php 
include '../../koneksi.php';

//created note
$title         = $_POST['title'];
$body          = $_POST['body'];
$id_notefolder = $_POST['id_notefolder'];
$trash         = $_POST['trash'];
$created       = date("Y-m-d H:i:s");
$id_user       = $_POST['id_user'];

// validasi
if ($title                            == "") { 	//jika title kosong
	header("location:../../to/note.php?pesan =title");	
}else if ($body                       == "") {	//jika content kosong
	header("location:../../to/note.php?pesan =body");
}else if ($id_notefolder              == "") {	//jika folder kosong
	header("location:../../to/note.php?pesan =note");
}else { //jika sudah valid -> proses create
	mysqli_query($koneksi, "insert into note (title, body, id_notefolder, trash, created, id_user) values('$title','$body','$id_notefolder','$trash','$created','$id_user')");
	header("location:../../to/note.php?pesan =input");
}
?>