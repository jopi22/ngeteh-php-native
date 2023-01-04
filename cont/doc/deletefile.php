<?php 
include '../../koneksi.php';

		//delete
$id_doc = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM dokumen WHERE id ='$id_doc'");
header("location:../../to/doc.php?pesan=hapus");
?>