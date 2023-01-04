<?php 
include '../../koneksi.php';

$hapusdata = $_POST['pilih'];
$jumlah_dipilih = count($hapusdata);
 
for($x=0;$x<$jumlah_dipilih;$x++){
	mysqli_query($koneksi, "DELETE FROM note WHERE id_note='$hapusdata[$x]'");
}
 
header("location:../../to/note.php?pesan=hapus");
?>