<html>

<head>
    <title>Форма завантаження файла</title>
    <meta charset="UTF-8">
</head>

<body>
    <a href="/unit6/backup.php"><button>Task1</button></a>
    <a href="/unit6/remove.php"><button>Task2</button></a>
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        Завантажити файл: <br><br>
        <input name="filename" type="file"><br><br>
        <input type="submit" value="Завантажити"><br><br>
    </form>

    <?php

    //$upload_dir = "F:/Dockern/src/transoft/unit6/upload";
    $upload_dir = "upload";
    if (isset($_FILES['filename'])) {
        $filename = $_FILES['filename']['name'];
        $tmp_filename = $_FILES['filename']['tmp_name'];
        move_uploaded_file($tmp_filename, "$upload_dir/$filename");
    }

    //var_dump($upload_files);

    $directory = __DIR__;
    $upload_files = scandir($upload_dir);

    // foreach ($upload_files as $filename) {
    //     if ($filename !== "." && $filename !== ".." && getimagesize("$upload_dir/$filename") > 0) {
    //         echo '<img src="' . "$upload_dir/$filename" . '">';
    //         echo date('r', filectime("$upload_dir/$filename"));
    //     }
    // }

    
    ?>

</body>

</html>