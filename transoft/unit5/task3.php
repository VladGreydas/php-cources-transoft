<html>

<head>
    <title>Task 5.3</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    class MainValues
    {
        static $sum;
        static $oddCount;
        static $even;
        static $abs;

        public function __construct()
        {
            self::$sum = 0;
            self::$oddCount = 0;
            self::$even = null;
            self::$abs = 0;
        }

        public static function getValues(): array
        {
            return ["sum" => self::$sum, "odd" => self::$oddCount, "even" => self::$even, "abs" => self::$abs];
        }

        public static function SetABS(int $count)
        {
            self::$abs = self::$sum / $count;
        }

        public static function Reset()
        {
            self::$sum = null;
            self::$oddCount = null;
            self::$even = null;
        }

        public static function NumProcess(int $number)
        {
            self::$sum += $number;
            if ($number % 2 === 0) {
                self::$oddCount++;
            } else {
                self::$even[] = $number;
            }
        }
    }

    function StringToArrayTransformer(string $input): array
    {
        if (!empty($input)) {
            $trimmedtext = trim($input);
            $explodedText = explode(',', $trimmedtext);
            for ($i = 0; $i < count($explodedText); $i++) {
                $explodedText[$i] = trim($explodedText[$i]);
            }
            return $explodedText;
        }
    }

    if (isset($_POST['array'])) {
        $message = "";
        $explodedText = StringToArrayTransformer($_POST['array']);
        for ($i = 0; $i < count($explodedText); $i++) {
            if (preg_match('/^[0-9]+$/', $explodedText[$i]) === 1) {
                $number = (int) $explodedText[$i];
                MainValues::NumProcess($number);
            } else {
                $message = "Array must contain only numbers";
                MainValues::Reset();
                break;
            }
        }
        if (!is_null(MainValues::$sum)) {
            MainValues::SetABS(count($explodedText));
            $valueArray = MainValues::getValues();
        }
    }
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <input type="text" name="array">
        <input type="submit" value="Відправити">
    </form>
    <p style="color: #ff0000;"><? if (isset($message)) {
                                    echo $message;
                                } ?></p>
    <p>Сума: <? if (isset($valueArray["sum"]) && !is_null($valueArray["sum"])) {
                    echo $valueArray["sum"];
                } ?></p>
    <p>Середнє значення: <? if (isset($valueArray["abs"]) && !is_null($valueArray["abs"] && is_null($message))) {
                                echo $valueArray["abs"];
                            } ?></p>
    <p>Кількість парних чисел: <? if (isset($valueArray["odd"]) && !is_null($valueArray["odd"] && is_null($message))) {
                                    echo $valueArray["odd"];
                                } ?></p>
    <p>Непарні числа: <? if (isset($valueArray["even"]) && !is_null($valueArray["even"]) && is_null($message)) {
                            echo implode(", ", $valueArray["even"]);
                        } ?></p>
</body>

</html>