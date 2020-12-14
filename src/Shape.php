<?php declare(strict_types=1);
namespace Shapes;

class Shape
{
    public ?string $name = null;

    protected float $width;

    protected float $length;

    private string $id;

    protected const SHAPE_TYPE = 1;

    public function __construct(float $width, float $length)
    {
        $this->width = $width;
        $this->length = $length;
        $this->id = uniqid();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public static function getShapeType(): int
    {
        return static::SHAPE_TYPE;
    }

    public function getArea(): float
    {
        return $this->width * $this->length;
    }

    public function getProperties(): ShapeProperties
    {
        return (new ShapeProperties($this->id, $this->name))
            ->setWidth($this->width)
            ->setLength($this->length);
    }
}
