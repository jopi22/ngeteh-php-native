<?php
$id_folder = $_GET['id'];
include "../layout/head.php";
include "../layout/nav.php";

?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <?= $id_folder; ?>
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
                <div class="card-body border-bottom py-3">
                    <!-- table -->
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File</th>
                                    <th>Lihat</th>
                                    <th>Kategori</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM dokumen WHERE kategori = '$id_folder' ORDER BY judul ASC");
                                $no = 1;
                                while ($result    = mysqli_fetch_array($query)) {
                                    $date          = $result['created'];
                                    $id_doc          = $result['id'];
                                    $judul       = $result['judul'];
                                    $kategori    = $result['kategori'];
                                    $image          = $result['image'];
                                ?>
                                    <tr>
                                        <td style="width: 10px;"><?php echo $no++; ?></td>
                                        <td style="width: 400px;"><?php echo $judul ?></td>
                                        <td style="width: 100px;">
                                            <a href="../cont/doc/file/<?php echo $image; ?>" target="_blank" type="button" class="btn btn-info"><i class="fas fa-info"></i></a>
                                        </td>
                                        <td style="width: 100;"><?php echo $kategori; ?></td>
                                        <td style="width: 100;"><?php echo $date; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
</div>

<?php
include "../layout/foot.php";
?>