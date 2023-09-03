<?php echo $this->extend('layout/template');?>

<?php echo $this->section('content');?>

    <a href="/komik/create">tambah data</a>
    <h1>Daftar Komik</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <?php foreach($komik as $k):?>
                <tr>
                    <th><?php echo $i++;?></th>
                    <!-- <td><img src="/img/<?php echo $k['sampul'];?>" alt=""></td> -->
                    <td><?php echo  $k["judul"];?></td>
                    <td>
                        <a href="/komik/<?php echo $k['slug'];?>">Detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>

<?php echo $this->endSection();?>