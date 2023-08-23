<!-- gunakan template -->
<?php echo $this->extend('layout/template');?>

<!-- batas content -->
<?php echo $this->section('content');?>

<div class="container">
    <div class="row">
        <div class="col-8">

            <h2 class="my-3">Form UbahData Komik</h2>
            
            <!-- memunculkan validation error -->
            <!-- punya mario -->
            
            <?php if (session('validation')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                               
                                <ul>
                                    <?php foreach (session('validation')->getErrors() as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>
          
                        
        <!-- punya mario  -->
            <!-- <?php //if (session('errors')) : ?>
        <div>
            <ul>
                <?php //foreach (session('errors') as $error) : ?>
                    <li><?//= $error ?></li>
                <?php //endforeach ?>
            </ul>
        </div>
    <?php //endif ?> -->
          
           
 <form action="/komik/update/<?php echo $komik['id'];?>" method="post">
    <!-- fitur ci4 agar menjaga form hanya bisa di input melalui halaman ini saja -->
    <?php echo csrf_field();?>
     <input type="hidden" name="slug" value="<?php echo $komik['slug'];?>">
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="judul" name="judul" value="<?php echo (old('judul'))? old('judul') : $komik['judul'];?>">
      
    </div>
  </div>
  <div class="mb-3 row">
    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo (old('penulis'))? old('penulis') : $komik['penulis'];?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo (old('penerbit'))? old('penerbit') : $komik['penerbit'];?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sampul" name="sampul" value="<?php echo (old('sampul'))? old('sampul') : $komik['sampul'];?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Ubah Data</button>
  </form>

        </div>
    </div>
</div>

<?php echo $this->endSection();?>