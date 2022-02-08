<?php

class Employee implements IEmployee
{
    private string $name;

    private int $age;

    private string $gender;

    private float $salary;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = 'Tolerant';
        $this->salary = 0.0;
    }

    public function printInfo()
    {
        $context = "Name: " . $this->name . ";\n";
        $context .= "Age: " . $this->age . PHP_EOL;
        $context .= "Gender: " . $this->gender . PHP_EOL;
        $context .= "Salary: " . $this->salary . PHP_EOL;

        echo $context;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getAge() : int
    {
        return $this->age;
    }

    public function setAge(int $age) : void
    {
        $this->age = $age;
    }

    public function getGender() : string
    {
        return $this->gender;
    }

    public function setGender(string $gender) : void
    {
        $this->gender = $gender;
    }

    public function getSalary() : float
    {
        return $this->salary;
    }

    public function setSalary(float $salary) : void
    {
        $this->salary = $salary;
    }
}