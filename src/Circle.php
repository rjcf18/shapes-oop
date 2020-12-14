<?php declare(strict_types=1);
namespace Shapes;

class Circle extends Shape
{
    protected float $radius;

    private string $id;

    protected const SHAPE_TYPE = 3;

    private const PI = 3.14;

    public function __construct(float $radius)
    {
        parent::__construct($radius, $radius);

        $this->radius = $radius;
        $this->id = uniqid();
    }

    public function getArea(): float
    {
        return $this->radius * $this->radius * self::PI;
    }

    public function getProperties(): ShapeProperties
    {
        return parent::getProperties()->setRadius($this->radius);
    }
}
