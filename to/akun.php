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
          Akun
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
          <button class="btn btn-success rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#file" type="button"><i class="fa fa-plus"></i>&nbsp; Add Akun</button>&nbsp;
          <button class="btn btn-danger rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#deletekategori" type="button"><i class="fa fa-trash"></i>&nbsp; Delete</button>
        </div>
        <div class="card-body border-bottom py-3">
          <!-- table -->
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Link</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Pemulihan</th>
                  <th>Created</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM bookmark WHERE user = '$id_user' ORDER BY nama ASC");
                while ($result    = mysqli_fetch_array($query)) {
                  $date          = $result['created'];
                  $id_bm          = $result['id'];
                  $nama       = $result['nama'];
                  $email    = $result['email'];
                  $link          = $result['link'];
                  $pemulihan          = $result['pemulihan'];
                  $password          = $result['password'];
                ?>
                  <tr>
                    <td style="width: 10px;"> <button class="btn btn-info rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#editlink<?php $id_bm; ?>" type="button"><i class="fa fa-edit"></i></button></td>
                    <td style="width: 400px;"><?php echo $nama ?></td>
                    <td style="width: 100px;">
                      <a href=".<?php echo $link; ?>" target="_blank" type="button" class="btn btn-info"><i class="fas fa-info"></i></a>
                    </td>
                    <td style="width: 100;"><?php echo $email; ?></td>
                    <td style="width: 100;"><?php echo $password; ?></td>
                    <td style="width: 100;"><?php echo $pemulihan; ?></td>
                    <td style="width: 100;"><?php echo $date; ?></td>
                  </tr>

                  <!-- modal edit -->
                  <div class="modal modal-blur fade" id="editlink<?php $id_bm; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../cont/akun/updatebm.php" method="post">
                          <div class="modal-body">
                            <div class="modal-title"><?php echo $nama; ?></div>
                            <label for="">Nama Link</label>
                            <input type="text" name="nama" maxlength="50" class="form-control" value="<?php echo $nama; ?>" required><br>
                            <label for="">Url Link</label>
                            <input type="text" name="link" maxlength="100" class="form-control" value="<?php echo $link; ?>" required><br>
                            <label for="">Email/Username</label>
                            <input type="text" name="email" maxlength="100" class="form-control" value="<?php echo $email; ?>" required><br>
                            <label for="">Password</label>
                            <input type="text" name="password" maxlength="100" class="form-control" value="<?php echo $password; ?>" required><br>
                            <label for="">Pemulihan</label>
                            <input type="text" name="pemulihan" maxlength="100" class="form-control" value="<?php echo $pemulihan; ?>" required><br>
                            <input type="hidden" name="created">
                            <input type="hidden" name="user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="id" value="<?php echo $id_bm; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update Akun</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete file -->
                  <div class="modal fade" id="hapus-<?php echo $id_doc; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $judul; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="../cont/akun/deletefile.php" method="post" enctype="multipart/form-data">
                            <h4>Apakah anda ingin menghapus data ini?</h4>
                            <input type="hidden" name="id" value="<?php echo $id_doc; ?>">
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


<!-- modal create file -->
<div class="modal modal-blur fade" id="file" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="../cont/bookmark/createbm.php" method="post">
        <div class="modal-body">
          <div class="modal-title">Tambah Akun</div>
          <label for="">Nama Link</label>
          <input type="text" name="nama" maxlength="50" class="form-control" required><br>
          <label for="">Url Link</label>
          <input type="text" name="link" maxlength="100" class="form-control" required><br>
          <label for="">Email/Username</label>
          <input type="text" name="email" maxlength="100" class="form-control" required><br>
          <label for="">Password</label>
          <input type="text" name="password" maxlength="100" class="form-control" required><br>
          <label for="">Pemulihan</label>
          <input type="text" name="pemulihan" maxlength="100" class="form-control" required><br>
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
        <div class="modal-title">Delete Akun</div>
        <table class="table table-striped">
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM bookmark WHERE user = '$id_user' ORDER BY nama ASC");
          while ($res = mysqli_fetch_array($query)) {
            $id_bmm = $res['id'];
            $nama = $res['nama'];
          ?>
            <tr>
              <td style="width: 1000px;"><?php echo $nama; ?></td>
              <form action="../cont/akun/deletebm.php" method="POST">
              <td><button type="submit"><i class="fas fa-trash"></i></button></td>
              <input type="hidden" name="id" value="<?php echo $id_bmm; ?>">
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