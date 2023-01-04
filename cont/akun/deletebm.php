<?php 
include '../../koneksi.php';

		//delete
$id = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM bookmark WHERE id ='$id'");
header("location:../../to/bookmark.php?pesan=hapus");
?>