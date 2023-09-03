<?php echo $this->extend('layout/template');?>

<?php echo $this->section('content');?>

<h2>Form update Data Komik</h2>

<form action="/komik/update/<?php echo $komik['id'];?>" method="post">
    <?php echo csrf_field();?>

    <input type="hidden" name="slug" value="<?php echo $komik['slug'];?>">
    <label for="judul">judul</label>
    <input type="text" id="judul" name="judul" autofocus value="<?php echo (old('judul'))? old('judul') : $komik['judul'];?>">
    <br>
    <label for="penulis">Penulis</label>
    <input type="text" id="penulis" name="penulis" value="<?php echo (old('penulis'))? old('penulis') : $komik['penulis'];?>">
    <br>
    <label for="penerbit">penerbit</label>
    <input type="text" id="penerbit" name="penerbit" value="<?php echo (old('penerbit'))? old('penerbit') : $komik['penerbit'];?>">
    <br>
    <button type="submit">Ubah data</button>

</form>

<?php echo $this->endSection();?>