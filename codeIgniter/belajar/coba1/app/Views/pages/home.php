<!-- kasih tahu ci bahwa halaman ini akan menggunakan file template folder layout -->
<?php echo $this->extend('layout/template');?>

<!-- kasih tahu bahwa bagian dibawah ini merupakan isi dari content nya  -->
<?php echo $this->section('content');?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world!</h1>
            
        </div>
    </div>
</div>

<!-- batas akhir section -->
<?php $this->endSection();?>
    