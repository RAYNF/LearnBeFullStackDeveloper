<?php echo $this->extend('layout/template');?>

<?php echo $this->section('content');?>

    <h2>Detail komik</h2>

    <!-- <img src="/img/<?php echo $komik['sampul'];?>" alt=""> -->

    <h5><?php echo $komik['judul']?></h5>
    <p><?php echo $komik['penulis']?></p>
    <p><?php echo $komik['penerbit']?></p>

    <a href="/komik/edit/<?php echo $komik['slug'];?>" class="btn btn-warning">Edit</a>
    
    <!-- teknik hapus yang lebih aman dengan http -->
    <form action="/komik/<?php echo $komik['id'];?>" method="post">
    <?php echo csrf_field();?>
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" onclick="return confirm('apakah anda yakin');">DELETE</button>

    </form>
    <br>
    <br>
    <a href="/">Kembali</a>
<?php echo $this->endSection();?>