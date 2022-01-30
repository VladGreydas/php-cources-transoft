<?php
class Calculator
{
    protected float $result;

    /**
     * An add function
     * @param array $numbers - an array of the operands
     * @return float
     */
    public function Add(array $numbers): float
    {
        return array_sum($numbers);
    }

    /**
     * A sub function (' - ')
     * @param array $numbers - an array of the operands
     * @return float
     */
    public function Sub(array $operands): float
    {
        $this->result = $operands[0];
        for ($i = 1; $i < count($operands); $i++) {
            $this->result -= $operands[$i];
        }
        return $this->result;
    }

    /**
     * A multiply function
     * @param array $numbers - an array of the operands
     * @return float
     */
    public function Multiply(array $operands): float
    {
        $result = $operands[0];
        for ($i = 1; $i < count($operands); $i++) {
            if ($operands[$i] === 0) return 0;
            $result *= $operands[$i];
        }
        return $result;
    }

    /**
     * A divide function
     * @param array $numbers - an array of the operands
     * @return float
     * @return INF in some cases (divide by zero) instead DivideByZeroException
     */
    public function Divide(array $operands): float
    {
        $this->result = $operands[0];
        for ($i = 1; $i < count($operands); $i++) {
            if ($operands[$i] === 0.0) {
                return INF;
            }
            $this->result /= $operands[$i];
        }
        return $this->result;
    }

    public function RunCalculator(string $operation, float ...$operands): float
    {
        if (count($operands) !== 0) {
            switch ($operation) {
                case '+':
                    if (count($operands) == 1) $calcResult = $operands[0];
                    else $calcResult = $this->Add($operands);
                    break;

                case '-':
                    if (count($operands) == 1) $calcResult = -$operands[0];
                    else $calcResult = $this->Sub($operands);
                    break;

                case '*':
                    if (count($operands) == 1) $calcResult = $operands[0] ** 2;
                    else $calcResult = $this->Multiply($operands);
                    break;

                case '/':
                    if (count($operands) == 1) $calcResult = 1 / $operands[0];
                    else $calcResult = $this->Divide($operands);
                    break;

                default:
                    echo "Command not found";
                    $calcResult = 0.0;
                    break;
            }

            return $calcResult;
        } else {
            echo "Operands not found...";
            return null;
        }
    }
}

$calculator = new Calculator();

echo $calculator->RunCalculator('+', 5) . "<br>"; // returns 5
echo $calculator->RunCalculator('+', 5.2, 3.3, 23, 35) . "<br>"; // returns 66
echo $calculator->RunCalculator('-', 5) . "<br>"; // returns -5
echo $calculator->RunCalculator('-', -5) . "<br>"; // returns 5
echo $calculator->RunCalculator('-', 5, 3, 2, 1, -10) . "<br>"; // returns 9
echo $calculator->RunCalculator('*', 5) . "<br>"; // returns 25
echo $calculator->RunCalculator('*', 5, 3, 1, 2) . "<br>"; // returns 30
echo $calculator->RunCalculator('*', 5, 2, 0, 1) . "<br>"; // returns 0
echo $calculator->RunCalculator('/', 5, 1, 2) . "<br>"; // returns 2.5
echo $calculator->RunCalculator('/', 5, 0) . "<br>"; // returns infinite, maybe
echo $calculator->RunCalculator('/', 5) . "<br>"; // returns 0.2, maybe
