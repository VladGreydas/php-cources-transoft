<html>

<head>
    <title>Task 3.3</title>
    <meta charset="UTF-8">
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="submit" value="Відправити">
    </form>
    <?php
    if (isset($_POST['text'])) {
        $lang = 1; // 1 for eng, 2 for ukr
        $text = $_POST['text'];
        $prevcheck = 0;
        $checkpoint = 0;
        for ($i = 0; $i < strlen($text); $i++) {
            if($i == (40*$lang*($prevcheck+1))) $checkpoint++;
            if ($checkpoint > $prevcheck && $text[$i] === ' ') {
                $text[$i] = "&";
                $prevcheck = $checkpoint;
            }
        }
        $result = str_replace('&', "<br>", $text);
        echo $result;
    }
    ?>
</body>

</html>