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

        <a href="/komik/edit/<?php echo $komik['slug'];?>" class="btn btn-warning">Edit</a>

        <!-- hapus yang lebih aman dengan teknik http -->
        <form action="/komik/<?php echo $komik['id'];?>" method="post" class="d-inline">
        <?php echo csrf_field();?>
        <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');">Delete</button>
        </form>

        <!-- hapus metode lama -->
        <!-- <a href="/komik/delete/<?php //echo $komik['id'];?>" class="btn btn-danger">Delete</a> -->

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