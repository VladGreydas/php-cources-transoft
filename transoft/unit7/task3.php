<?php
interface Shape
{
    public function getArea(): float;
}

class Rectangle implements Shape
{
    private $width = 0;
    private $height = 0;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}

class Square implements Shape
{
    private $length = 0;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function getArea(): float
    {
        return $this->length ** 2;
    }
}

class Circle implements Shape
{
    private $radius = 0;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return (M_PI * ($this->radius ** 2));
    }
}

class Triangle implements Shape
{
    private $sideLength = 0;
    private $height = 0;

    public function __construct(int $sideLength, int $height)
    {
        $this->height = $height;
        $this->sideLength = $sideLength;
    }

    public function getArea(): float
    {
        return (0.5 * $this->sideLength * $this->height);
    }
}
function printArea(Shape $shape): void
{
    echo sprintf('%s has area %f.', get_class($shape), $shape->getArea()).PHP_EOL;
}

$shapes = [new Rectangle(4, 5), new Square(5), new Circle(5), new Triangle(3, 2)];

foreach ($shapes as $shape) {
    printArea($shape);
}