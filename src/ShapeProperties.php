<?php declare(strict_types=1);
namespace Shapes;

class ShapeProperties
{
    private string $id;

    private string $name;

    private ?float $width = null;

    private ?float $length = null;

    private ?float $radius = null;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getRadius(): ?float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): self
    {
        $this->radius = $radius;

        return $this;
    }
}
