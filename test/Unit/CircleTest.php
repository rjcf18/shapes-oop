<?php declare(strict_types=1);
namespace Shapes\Test\Unit;

use PHPUnit\Framework\TestCase;
use Shapes\Circle;
use Shapes\ShapeProperties;
use TypeError;

class CircleTest extends TestCase
{
    /**
     * @test
     */
    public function create_withValidParameters_returnsCorrectInstance()
    {
        $shape = new Circle(2.1);

        $this->assertInstanceOf(Circle::class, $shape);
    }

    /**
     * @test
     */
    public function create_withInvalidParameters_throwsTypeError()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Argument #1 ($radius) must be of type float, string given');

        $shape = new Circle("2.1");

        $this->assertNull($shape);
    }

    /**
     * @test
     */
    public function getName_whenNoNameWasSet_returnsNull()
    {
        $shape = new Circle(2.1);

        $this->assertNull($shape->getName());
    }

    /**
     * @test
     */
    public function getName_whenNameWasSet_returnsName()
    {
        $name = 'Test';

        $shape = (new Circle(2.1))
            ->setName($name);

        $this->assertEquals($name, $shape->getName());
    }

    /**
     * @test
     */
    public function getProperties_returnsPropertiesObject()
    {
        $shape = new Circle(2.1);

        $expectedProperties = (new ShapeProperties('id'))
            ->setRadius(2.1);

        $shapeProperties = $shape->getProperties();

        $this->assertNotNull($shapeProperties->getId());
        $this->assertNull($shapeProperties->getName());
        $this->assertEquals($expectedProperties->getName(), $shapeProperties->getName());
        $this->assertEquals($expectedProperties->getRadius(), $shapeProperties->getRadius());
        $this->assertEquals($expectedProperties->getRadius(), $shapeProperties->getWidth());
        $this->assertEquals($expectedProperties->getRadius(), $shapeProperties->getLength());
    }

    /**
     * @test
     */
    public function getShapeType_returnsCorrectType()
    {
        $this->assertEquals(3, Circle::getShapeType());
    }

    /**
     * @test
     */
    public function getArea_returnsCorrectShapeArea()
    {
        $shape = new Circle(2.1);

        $this->assertEquals(13.8474, $shape->getArea());
    }
}
