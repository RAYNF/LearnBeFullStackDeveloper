<!-- gunakan template -->
<?php echo $this->extend('layout/template');?>

<!-- batas content -->
<?php echo $this->section('content');?>

<div class="container">
    <div class="row">
        <div class="col">
    <h2 class="mt-2">Detail komik</h2>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/<?php echo $komik['sampul'];?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $komik['judul'];?></h5>
        <p class="card-text"><b>Penulis : </b><?php echo $komik['penulis'];?> </p>
        <p class="card-text"><small class="text-body-secondary"><b>Penerbit :</b><?php echo $komik['penerbit'];?>  </small></p>

        <a href="" class="btn btn-warning">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>

        <br><br>
        <a href="/komik/index">Kembali ke daftar komik</a>
    </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>

<?php echo $this->endSection();?>