<?php 
include '../../koneksi.php';
//created note
$title         = $_POST['title'];
$body          = $_POST['body'];
$id_notefolder = $_POST['id_notefolder'];
$trash         = $_POST['trash'];
$created       = date("Y-m-d H:i:s");
$id_user       = $_POST['id_user'];
$id            = $_POST['id_note'];

//validasi
if ($title                            == "") { //jika title kosong
	header("location:../../to/note.php?pesan =title");	
}else if ($body                       == "") { //jika content kosong
	header("location:../../to/note.php?pesan =body");
}else if ($id_notefolder              == "") { ////jika folder kosong
	header("location:../../to/note.php?pesan=note");
}else { //jika sudah valid -> proses update
	mysqli_query($koneksi, "UPDATE note SET title ='$title',body='$body',id_notefolder='$id_notefolder',trash='$trash',created='$created',id_user='$id_user' WHERE id_note='$id'");
	header("location:../../to/note.php?pesan=update");
}
?>