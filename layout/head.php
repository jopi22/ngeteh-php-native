<?php
include '../koneksi.php';

//memulai session yang disimpan pada browser
session_start();
$name = $_SESSION['name'];
$id_user = $_SESSION['id_user'];

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "sudah_login") {
  // jika belum login akan melakukan pengalihan
  header("location:../index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>NGETEH &maltese; 2022 </title>
  <!-- CSS files -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="../assets/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-flags.min.css?1666304673" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-payments.min.css?1666304673" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-vendors.min.css?1666304673" rel="stylesheet" />
  <link href="../assets/dist/css/demo.min.css?1666304673" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/table/all.min.css">
  <link rel="stylesheet" href="../assets/table/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/table/vendor.bundle.addons.css">
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
  </style>

  <!-- script thumbnail preview music -->
  <style type="text/css">
    #dImage {
      width: 100%;
      max-height: 15vh;
      object-fit: scale-down;
      object-position: center center;
      ;
    }
  </style>
  <script>
    function displayImg(input, displayTo) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#' + displayTo).attr('src', e.target.result);
          $(input).siblings('.custom-file-label').html(input.files[0].name)
        }

        reader.readAsDataURL(input.files[0]);
      } else {
        $('#' + displayTo).attr('src', "./images/music-logo.jpg");
        $(input).siblings('.custom-file-label').html("Choose File")
      }
    }
  </script>
  <!-- script thumbnail preview music xx-->
</head>