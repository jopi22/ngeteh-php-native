<?php 
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == "input"){
    echo '<div class="alert alert-info">
    <b>Success!</b> Your data has been saved successfully.
    </div>';
  }else if($pesan == "update"){
    echo '<div class="alert alert-info">
    <b>Success!</b> Your note has been update successfully.
    </div>';
  }else if($pesan == "hapus"){
    echo '<div class="alert alert-info">
    <b>Success!</b> Your note has been deleted.
    </div>';
  }else if($pesan == "title"){
    echo '<div class="alert alert-danger">
    <b>Failed!</b> Your title can not be empty.
    </div>';
  }else if($pesan == "body"){
    echo '<div class="alert alert-danger">
    <b>Failed!</b> Your content can not be empty.
    </div>';
  }else if($pesan == "note"){
    echo '<div class="alert alert-danger">
    <b>Failed!</b> Your folder must be select.
    </div>';
  }else if($pesan == "upload"){
    echo '<div class="alert alert-info">
    <b>Success!</b> Your folder has been saved successfully.
    </div>';
  }else if($pesan == "uploadfail"){
    echo '<div class="alert alert-danger">
    <b>Failed!</b> Your folder must be select.
    </div>';
  }else if($pesan == "uploadsize"){
    echo '<div class="alert alert-danger">
    <b>Failed!</b> Your folder must be select.
    </div>';
  }
}
