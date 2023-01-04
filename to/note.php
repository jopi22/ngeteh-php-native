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
          Catatan
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
          <button class="btn btn-success rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#modal-scrollable" type="button"><i class="fa fa-plus"></i> Add</button>
        </div>
        <div class="card-body border-bottom py-3">
          <!-- table -->
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Show</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM note WHERE id_user = '$id_user' AND trash > 0 ORDER BY id_note DESC");
                $number = 1;
                while ($result    = mysqli_fetch_array($query)) {
                  $date          = $result['created'];
                  $id_note       = $result['id_note'];
                  $title_note    = $result['title'];
                  $body          = $result['body'];
                  $id_notefolder = $result['id_notefolder'];
                ?>
                  <tr>
                    <td style="width: 10px;"><?php echo $number++; ?></td>
                    <td style="width: 400px;"><?php echo $title_note ?></td>
                    <td style="width: 100px;">
                      <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#show-<?php echo $id_note; ?>">
                        <i class="fas fa-eye"></i>
                      </button>
                    </td>
                    <td style="width: 100;"><?php echo $date; ?></td>
                    <td style="width: 100;">
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $id_note; ?>">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-<?php echo $id_note; ?>">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                  <!-- Modal edit -->
                  <div class="modal modal-blur fade" id="edit-<?php echo $id_note; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../cont/note/noteu.php" enctype="multipart/form-data" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title"><?php echo $id_note; ?> <?php echo $id_note; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title_note; ?>" class="form-control"><br>
                            <!-- <label>Gambar</label>
                              <input type="file" name="file" class="form-control"><br> -->
                            <label>Folder</label>
                            <select class="form-control" name="id_notefolder">
                              <option value="<?php echo $id_notefolder; ?>"><?php echo $id_notefolder; ?></option>
                              <?php
                              $folder     = mysqli_query($koneksi, "SELECT * FROM notefolder WHERE id_user = '$id_user' AND trash > 0 ORDER BY id_notefolder DESC");
                              $no        = 1;
                              while ($hasil = mysqli_fetch_array($folder)) {
                                $id        = $hasil['id_notefolder'];
                                $title     = $hasil['title'];
                              ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                              <?php } ?>
                            </select><br>
                            <label>Content</label>
                            <textarea name="body" class="form-control" id="" cols="30" rows="10"><?php echo $body ?></textarea><br>
                            <input type="hidden" name="trash" value="1">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="id_note" value="<?php echo $id_note; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- modal show -->
                  <div class="modal modal-blur fade" id="show-<?php echo $id_note; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../cont/note/noteu.php" enctype="multipart/form-data" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title"><?php echo $id_note; ?> <?php echo $id_note; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title_note; ?>" class="form-control"><br>
                            <!-- <label>Gambar</label>
                              <input type="file" name="file" class="form-control"><br> -->
                            <label>Folder</label>
                            <select class="form-control" name="id_notefolder">
                              <option value="<?php echo $id_notefolder; ?>"><?php echo $id_notefolder; ?></option>
                              <?php
                              $folder     = mysqli_query($koneksi, "SELECT * FROM notefolder WHERE id_user = '$id_user' AND trash > 0 ORDER BY id_notefolder DESC");
                              $no        = 1;
                              while ($hasil = mysqli_fetch_array($folder)) {
                                $id        = $hasil['id_notefolder'];
                                $title     = $hasil['title'];
                              ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                              <?php } ?>
                            </select><br>
                            <label>Content</label>
                            <?php echo $body
                            ?>
                            <input type="hidden" name="trash" value="1">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="id_note" value="<?php echo $id_note; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal hapus -->
                  <div class="modal fade" id="hapus-<?php echo $id_note; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $title_note ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="../cont/note/noted.php" method="post" enctype="multipart/form-data">
                            <h4>Apakah anda ingin menghapus barang ini?</h4>
                            <input type="hidden" name="id_note" value="<?php echo $id_note; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
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
    </div>
  </div>
</div>

<!-- modal create -->
<div class="modal modal-blur fade" id="modal-scrollable" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="../cont/note/notec.php" enctype="multipart/form-data" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Scrollable modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label>Title</label>
          <input type="text" name="title" class="form-control"><br>
          <!-- <label>Gambar</label>
            <input type="file" name="file" class="form-control"><br> -->
          <label>Folder</label>
          <select class="form-control" name="id_notefolder" id="">
            <option value="">Pilih Folder</option>
            <?php
            // include '../koneksi.php';              
            $query     = mysqli_query($koneksi, "SELECT * FROM notefolder WHERE id_user = '$id_user' AND trash > 0 ORDER BY id_notefolder DESC");
            $no        = 1;
            while ($res = mysqli_fetch_array($query)) {
              $id        = $res['id_notefolder'];
              $title     = $res['title'];
            ?>
              <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
            <?php } ?>
          </select><br>
          <label>Content</label>
          <textarea name="body" class="form-control" id="tinymce-mytextarea" cols="30" rows="10"></textarea><br>

          <input type="hidden" name="trash" value="1">
          <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php
include "../layout/foot.php";
?>