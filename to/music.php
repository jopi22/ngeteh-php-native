<?php 
include "../layout/head.php";
include "../layout/nav.php";
?>

<!-- Page header -->
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">
					Album Musik 
				</h2>
			</div>
		</div>
	</div>
</div>

<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">

			<div class="col-md-6 col-xl-3">
				<a data-bs-toggle="modal" data-bs-target="#create" class="card card-link"  href="#">
					<div style="background: #000" class="card-body">
						<div class="row">
							<div class="col-auto">
								<span class="avatar rounded" style="background-image: url(../assets/static/avatars/001f.jpg)"></span>
							</div>
							<div class="col">
							  <div class="font-weight-medium">Tambah Album Musik</div>
							</div>
						</div>
					</div>
				</a>
			</div>	

			<?php 
			$query = mysqli_query($koneksi, "SELECT * FROM musicfolder WHERE id_user = '$id_user' ORDER BY id_music DESC");
			while($res = mysqli_fetch_array($query)){
				$id_music = $res['id_music'];				
				$title = $res['title'];				
				$image = $res['image'];				
				?>		
				<div class="col-md-6 col-xl-3">
					<a class="card card-link"  href="../cont/music/player.php?id=<?php echo $id_music ?>">
						<div class="card-body">
							<div class="row">
								<div class="col-auto">
									<img src="<?php echo "../cont/music/file/".$image; ?>" height='40px'>
								</div>
								<div class="col">
								  <div class="font-weight-medium"><?php echo $title; ?></div>
								  <div class="text-muted">#</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>			
		</div>
	</div>
</div>

<!-- modal create -->
<div class="modal modal-blur fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="../cont/music/musicc.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="modal-title">Buat Album Baru</div>
					<label for="">Nama Album</label>
					<input type="text" name="title" class="form-control" required><br>
					<label for="">Thumbnail</label>
					<input type="file" name="file" class="form-control" required accept=".png, .jpg, .jpeg, .ico, .mp3" onchange="displayImg(this,'dImage')"><br>

					<img src="../cont/music/images/music-logo.jpg" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage">

					<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
					<input type="hidden" name="created">
				</div>
				<div class="modal-footer">        
					<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Simpan Folder</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
include "../layout/foot.php";
?>