<?php declare(strict_types=1);
namespace Shapes;

class Shape
{
    private string $id;

    public ?string $name = null;

    protected float $width;

    protected float $length;

    protected const SHAPE_TYPE = 1;

    public function __construct(float $width, float $length)
    {
        $this->id = uniqid();
        $this->width = $width;
        $this->length = $length;
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
        $shapeProperties = (new ShapeProperties($this->id))
            ->setWidth($this->width)
            ->setLength($this->length);

        if (!is_null($this->name)) {
            $shapeProperties->setName($this->name);
        }

        return $shapeProperties;
    }
}
