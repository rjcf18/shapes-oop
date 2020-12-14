<?php declare(strict_types=1);
namespace Shapes\Test\Unit;

use PHPUnit\Framework\TestCase;
use Shapes\Shape;

class ShapeTest extends TestCase
{
    /**
     * @test
     */
    public function create_withValidParameters_returnsCorrectInstance()
    {
        $shape = new Shape(1.5, 2.5);

        $this->assertInstanceOf(Shape::class, $shape);
    }
}
