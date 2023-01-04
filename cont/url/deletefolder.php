<?php 
include '../../koneksi.php';

		//delete
$id_folderr = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM url_kategori WHERE id ='$id_folderr'");
header("location:../../to/url.php?pesan=hapus");
?>