<?php 
include '../../koneksi.php';

		//delete
$id_url = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM url WHERE id ='$id_url'");
header("location:../../to/url.php?pesan=hapus");
?>