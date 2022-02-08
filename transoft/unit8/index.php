<?php
function myAutoloader($class_name)
{
    if (!class_exists($class_name))
    {
        include 'Model/' . $class_name . '.php';
    }
}

spl_autoload_register("myAutoloader");

$worker1 = new Employee('Vlad', 21);

$worker1->setGender('Male');
$worker1->setSalary(300.00);

$worker1->printInfo();