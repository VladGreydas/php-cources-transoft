<?php
define('M', 7);
define('N', 7);
?>

<html>

<head>
    <title>Task 4.2</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $array = array(array());
    for($i = 0; $i < M; $i++){
        for($j = 0; $j < N; $j++){
            $array[$i][$j] = rand(1, 100);
        }
    }

    for($i = 0; $i < M; $i++){
        for($j = 0; $j < N; $j++){
            echo $array[$i][$j].' ';
        }
        echo '<br>';
    }
    ?>
</body>

</html>