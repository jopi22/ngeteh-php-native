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
          Album
        </h2>
      </div>
    </div>
  </div>
</div>

<!-- Page body -->
<div class="page-body">
  <div class="container-xl d-flex flex-column justify-content-center">
    <!-- pesan -->
    <?php include "../layout/notif.php"; ?>
    <!-- content -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button class="btn btn-info rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#kategori" type="button"><i class="fa fa-plus"></i>&nbsp; Album</button>&nbsp;
          <button class="btn btn-success rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#file" type="button"><i class="fa fa-plus"></i>&nbsp; Url</button>&nbsp;
          <button class="btn btn-danger rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#deletekategori" type="button"><i class="fa fa-trash"></i>&nbsp; Kategori</button>
        </div>
        <div class="card-body border-bottom py-3">
          <!-- table -->
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Link</th>
                  <th>Aksi</th>
                  <th>Kategori</th>
                  <th>Created</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM url WHERE user = '$id_user' ORDER BY nama ASC");
                $no = 1;
                while ($result    = mysqli_fetch_array($query)) {
                  $date          = $result['created'];
                  $id_url          = $result['id'];
                  $nama       = $result['nama'];
                  $kategori    = $result['kategori'];
                  $link          = $result['link'];
                ?>
                  <tr>
                    <td style="width: 10px;"><?php echo $no++; ?></td>
                    <td style="width: 400px;"><?php echo $nama ?></td>
                    <td style="width: 100px;">
                      <a href="<?php echo $link; ?>" target="_blank" type="button" class="btn btn-info"><i class="fas fa-info"></i></a>
                    </td>
                    <td style="width: 100;">
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editfile-<?php echo $id_url ; ?>">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-<?php echo $id_url ; ?>">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                    <td style="width: 100;"><?php echo $kategori; ?></td>
                    <td style="width: 100;"><?php echo $date; ?></td>
                  </tr>

                  <!-- modal update file -->
                  <div class="modal modal-blur fade" id="editfile-<?php echo $id_url; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../cont/url/updateurl.php" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="modal-title">Edit File</div>
                            <label for="">Nama url</label>
                            <input type="text" name="nama" maxlength="50" class="form-control" required value="<?php echo $nama; ?>"><br>
                            <label for="">Link</label>
                            <input type="text" name="link" maxlength="50" class="form-control" required value="<?php echo $link; ?>"><br>
                            <input type="hidden" name="created">
                            <input type="hidden" name="user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="id" value="<?php echo $id_url; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Simpan File</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete file -->
                  <div class="modal fade" id="hapus-<?php echo $id_url; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nama ; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="../cont/url/deleteurl.php" method="post" enctype="multipart/form-data">
                            <h4>Apakah anda ingin menghapus data ini?</h4>
                            <input type="hidden" name="id" value="<?php echo $id_url; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><br>

    <!-- kategori -->
    <div class="row row-cards">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM url_kategori WHERE user = '$id_user' ORDER BY judul ASC");
      while ($res = mysqli_fetch_array($query)) {
        $id = $res['id'];
        $judul = $res['judul'];
      ?>
        <div class="col-md-6 col-xl-3">
          <a class="card card-link" href="../to/doclist.php?id=<?php echo $judul; ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-10">
                  <?php echo $judul; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>

  </div>
</div>


<!-- modal create kategori -->
<div class="modal modal-blur fade" id="kategori" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="../cont/album/createalbum.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="modal-title">Buat Album Baru</div>
          <label for="">Nama Album</label>
          <input type="text" name="judul" maxlength="50" class="form-control" required>
          <label for="">Thumbnail</label>
          <input type="file" name="file" class="form-control" required>
          <input type="hidden" name="user" value="<?php echo $id_user; ?>">
          <input type="hidden" name="created">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Simpan Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal create file -->
<div class="modal modal-blur fade" id="file" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="../cont/url/createurl.php" method="post">
        <div class="modal-body">
          <div class="modal-title">Tambah Data Url</div>
          <label for="">Nama url</label>
          <input type="text" name="nama" maxlength="50" class="form-control" required><br>
          <label for="">Link</label>
          <input type="text" name="link" maxlength="50" class="form-control" required><br>
          <select class="form-control" name="kategori" id="">
            <option value="">Pilih Kategori</option>
            <?php
            $query     = mysqli_query($koneksi, "SELECT * FROM url_kategori WHERE user = '$id_user'");
            while ($res = mysqli_fetch_array($query)) {
              $id        = $res['id'];
              $judul     = $res['judul'];
            ?>
              <option value="<?php echo $judul; ?>"><?php echo $judul; ?></option>
            <?php } ?>
          </select><br>
          <input type="hidden" name="created">
          <input type="hidden" name="user" value="<?php echo $id_user; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Simpan File</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal delete kategori -->
<div class="modal modal-blur fade" id="deletekategori" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Delete Kategori</div>
        <table class="table table-striped">
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM url_kategori WHERE user = '$id_user' ORDER BY judul ASC");
          while ($res = mysqli_fetch_array($query)) {
            $id_folderr = $res['id'];
            $judul = $res['judul'];
          ?>
            <tr>
              <td style="width: 1000px;"><?php echo $judul; ?></td>
              <form action="../cont/url/deletefolder.php" method="POST" enctype="multipart/form-data">
              <td><button type="submit"><i class="fas fa-trash"></i></button></td>
              <input type="hidden" name="id" value="<?php echo $id_folderr; ?>">
              </form>
            </tr>

          <?php } ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Simpan File</button>
      </div>
    </div>
  </div>
</div>

<?php
include "../layout/foot.php";
?>