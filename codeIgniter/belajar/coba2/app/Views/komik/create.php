<?php echo $this->extend('layout/template');?>

<?php echo $this->section('content');?>

<h2>Form Tambah Data Komik</h2>

<form action="/komik/save" method="post">
    <?php echo csrf_field();?>

    <label for="judul">judul</label>
    <input type="text" id="judul" name="judul" autofocus>
    <br>
    <label for="penulis">Penulis</label>
    <input type="text" id="penulis" name="penulis">
    <br>
    <label for="penerbit">penerbit</label>
    <input type="text" id="penerbit" name="penerbit">
    <br>
    <button type="submit">Tambah data</button>

</form>

<?php echo $this->endSection();?>