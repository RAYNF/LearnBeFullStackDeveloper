<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
</head>
<body>

    <!-- dibagian sini kita akan mencetak sebuah seksion yang diambil dari halaman yang memanggil -->
    <?php echo $this->renderSection('content');?>
    
</body>
</html>