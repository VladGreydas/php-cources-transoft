<html>

<head>
    <title>Task 5.4</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php

    function fib($n)
    {
        $fib_array = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fib_array[$i] = $fib_array[$i - 1] + $fib_array[$i - 2];
        }
        return $fib_array;
    }

    function rec_fib($n)
    {
        if ($n == 0) return 0; //To return the first Fibonacci number   
        if ($n == 1) return 1; //To return the second Fibonacci number   
        return rec_fib($n - 1) + rec_fib($n - 2);
    }

    echo "Iterative Fibonacci: ";
    $fib = fib(20);
    foreach($fib as $number){
        echo $number.", ";
    }

    echo "<br>Recursive Fibonacci: ";
    for ($i = 0; $i < 20; $i++) {
        echo rec_fib($i).", ";
    }
    ?>
</body>

</html>