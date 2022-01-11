<?php
function sort_uk($a, $b)
{
    $a = mb_strtoupper($a, 'UTF-8');
    $b = mb_strtoupper($b, 'UTF-8');
    $alphabet = array(
        'А' => 1, 'Б' => 2, 'В' => 3, 'Г' => 4, 'Д' => 5, 'Е' => 6, 'Є' => 7, 'Ж' => 8, 'З' => 9, 'И' => 10, 'І' => 11,
        'Ї' => 12, 'Й' => 13, 'К' => 14, 'Л' => 15, 'М' => 16, 'Н' => 17, 'О' => 18, 'П' => 19, 'Р' => 20, 'С' => 21, 'Т' => 22,
        'У' => 23, 'Ф' => 24, 'Х' => 25, 'Ц' => 26, 'Ч' => 27, 'Ш' => 28, 'Щ' => 29, 'Ь' => 30, 'Ю' => 31, 'Я' => 32
    );
    $lengthA = mb_strlen($a, 'UTF-8');
    $lengthB = mb_strlen($b, 'UTF-8');
    for ($i = 0; $i < ($lengthA > $lengthB ? $lengthB : $lengthA); $i++) {
        if ($alphabet[mb_substr($a, $i, 1, 'UTF-8')] < $alphabet[mb_substr($b, $i, 1, 'UTF-8')]) {
            $status = -1;
            break;
        } elseif ($alphabet[mb_substr($a, $i, 1, 'UTF-8')] > $alphabet[mb_substr($b, $i, 1, 'UTF-8')]) {
            $status = 1;
            break;
        } else {
            $status = 0;
        }
    }
    return $status;
}

function NameArrayProcessing(string $input): string
{
    $message = "";
    $trimmedtext = trim($input);
    $explodedText = explode(',', $trimmedtext);
    for ($i = 0; $i < count($explodedText); $i++) {
        $explodedText[$i] = trim($explodedText[$i]);
    }
    uasort($explodedText, 'sort_uk');
    $message = implode(", ", $explodedText);
    return $message;
}
?>

<html>

<head>
    <title>Task 5.1</title>
    <meta charset="UTF-8">
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <p>Enter names: <textarea name="text" cols="30" rows="10"></textarea></p>
        <input type="submit" value="Send">
    </form>
    <?php
    if (isset($_POST['text'])) {
        echo NameArrayProcessing($_POST['text']);
    }
    ?>
</body>

</html>