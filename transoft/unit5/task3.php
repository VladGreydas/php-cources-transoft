<html>

<head>
    <title>Task 5.3</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $sum = 0;
    $oddCount = 0;
    $even = array();

    $NumberProcess = function ($number) use (&$sum, &$oddCount, &$even) {
        $sum += $number;
        if ($number % 2 === 0) {
            $oddCount++;
        } else {
            $even[] = $number;
        }
    };

    if (isset($_POST['array'])) {
        $message = "";
        $numArray = array();
        $trimmedtext = trim($_POST['array']);
        $explodedText = explode(',', $trimmedtext);
        for ($i = 0; $i < count($explodedText); $i++) {
            $explodedText[$i] = trim($explodedText[$i]);
        }
        for ($i = 0; $i < count($explodedText); $i++) {
            if (preg_match('/\d+/', $explodedText[$i]) === 1) {
                $number = (int) $explodedText[$i];
                $NumberProcess($number);
            } else {
                $message = "Array must contain only numbers";
                $sum = null;
                $oddCount = null;
                $even = null;
                break;
            }
        }
        if (!is_null($sum))
            $abs = $sum / count($explodedText);
    }
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <input type="text" name="array">
        <input type="submit" value="Відправити">
    </form>
    <p style="color: #ff0000;"><? if (isset($message)) {
                                    echo $message;
                                } ?></p>
    <p>Сума: <? if (isset($sum) && !is_null($sum)) {
            echo $sum;
        } ?></p>
    <p>Середнє значення: <? if (isset($abs) && !is_null($abs)) {
            echo $abs;
        } ?></p>
    <p>Кількість парних чисел: <? if (isset($oddCount) && !is_null($oddCount)) {
            echo $oddCount;
        } ?></p>
    <p>Непарні числа: <? if (isset($even) && !is_null($even)) {
            echo implode(", ", $even);
        } ?></p>
</body>

</html>