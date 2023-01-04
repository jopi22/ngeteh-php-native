<?php 
include '../../koneksi.php';

//created note
$judul         = $_POST['judul'];
$created       = date("Y-m-d H:i:s");
// $kategori       = $_POST['kategori'];
$user       = $_POST['user'];
$id_doc       = $_POST['id'];

// input file
$ekstensi_diperbolehkan	= array('pdf');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];


if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 104407012312312312312){			
		move_uploaded_file($file_tmp, 'file/'.$nama);
		$query = mysqli_query($koneksi, "UPDATE dokumen SET image ='$nama',judul='$judul',user='$user',created='$created' WHERE id='$id_doc'");
		if($query){
			header("location:../../to/doc.php?pesan =update");
		}else{
			header("location:../../to/doc.php?pesan =hmm");
		}
	}else{
		header("location:../../to/doc.php?pesan =hmm");
	}
}


?>