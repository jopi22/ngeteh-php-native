<?php 
include '../../koneksi.php';

		//delete
$id_note = $_POST['id_note'];

mysqli_query($koneksi, "DELETE FROM note WHERE id_note ='$id_note'");
header("location:../../to/note.php?pesan=hapus");
?>