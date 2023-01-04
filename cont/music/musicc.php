<?php 
include '../../koneksi.php';

//created note
$title         = $_POST['title'];
$created       = date("Y-m-d H:i:s");
$id_user       = $_POST['id_user'];

//input file
$ekstensi_diperbolehkan	= array('png','jpg', 'mp3');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];	

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 104407012312312312312){			
		move_uploaded_file($file_tmp, 'file/'.$nama);
		$query = mysqli_query($koneksi, "insert into musicfolder (image, created, title, id_user) values('$nama','$created','$title','$id_user')");
		if($query){
			header("location:../../to/music.php?pesan =input");
		}else{
			header("location:../../to/music.php?pesan =input");
		}
	}else{
		header("location:../../to/music.php?pesan =input");
	}
}


?>