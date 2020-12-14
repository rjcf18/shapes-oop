# Shapes

## Index
* [Introduction](#introduction)
* [Resources/Tools](#resources)
* [Exercise Explanation](#exercise-explanation)
* [Approach Explanation](#approach-explanation)
* [Setup Project](#setup-project)
* [Improvements](#improvements)

## Introduction

OOP example for a programming exercise involving shapes area calculation like rectangles, circles, squares, etc.

## Resources

This exercise was done using `PHP 8.0`, `PHPUnit` for the unit tests and `Docker` for configuring a container with this PHP version in order to be able to run other commands and unit tests.

## Exercise Explanation

The objective and guidelines of this exercise pointed towards the creation of a basic structure of classes with a Shape parent class with properties with different kinds of visibility, a specific signature, methods to obtain some of the properties, and a method to calculate the area of the Shape.
Besides the basic Shape class there are 2 other shape classes that should extend the base Shape class and inherit some properties and calculate the area of the shape in different ways.

## Approach Explanation

The first approach (Approach A) for this exercise done in a way that was very coupled to the instructions provided for it.
Started by creating the base Shape class according to the instructions with the proper types and visibility that was requested, 
with the getters and setters for the same (this is a nullable field since the object can be created without ever setting a name for the shape), 
with a getter for the shape type constant value (this constant was defined as protected because in this case there ws no need to have it public 
since it was mentioned to have a getter for its value), the method for obtaining the shape are and the getter to obtain the class properties.
For the properties a simple object was created for holding these properties.
Another shape class, Rectangle shape, was created extending the base Shape class, which has only an override of the shape type constant with the value for rectangles, 
everything else is inherited from the parent. The final one to be created was a Circle shape class which extends the Shape class and defines a new property (radius), 
overrides the shape type constant from the parent and has its own way to calculate the area using the radius (a constant was created for the Pi value using 3.14). 
The properties object was created taking into account the circle properties as well (length, width and radius are nullable/optional fields in the object and are set according to each the shape class), 
had to revert from the approach from splitting the properties object into a base properties and child properties files because of the fact that the Shape class has the characteristics of a rectangle shape,
instead of being just an abstract class that defines some of the the methods as abstract for the children to implement.
For the unique id generation the PHP function `uniqid` was used.

Unit tests were created for all the shape classes testing the area calculation methods and the other defined methods.

## Setup Project

If you wish to setup the project locally and run the unit tests there are a set of defined composer commands in order to do this more easily.

`Composer` is required to be installed, any version should work. `Docker` and `docker-compose` should also be be installed in order to run the tests inside the PHP 8.0 container.

For setting up the project go to the project root and run: `composer run setup` and after everything was setup, for running the unit tests run: `composer run unitTests`.

## Improvements

There are a couple of improvements here to be done if we attempt to analyse a possible refactor and discard some of the given restrictions for the exercise. For example, 
the Shape class could be converted to an abstract class, the constructor would receive no arguments (it would only initialize the ID), 
the `getArea` and `getProperties` methods would be changed to abstract methods as well so that they can be properly implemented by the child classes. 
This way we would avoid having to duplicate the ID property in the circle shape class (we could change visiblity to protected as well to solve that issue) 
or having to set the radius as length and width for the circle. With all this we could also split the properties object into a parent properties object and children properties 
objects in order to not concentrate all of the possible properties of all the children for Shape in the same properties object.

Regarding the problem about mocking the Shape class I don't see in this case how it could be any problem, I don't see much need in having to mock the Shape class in this case,
unless it was a dependency of another class that was meant to be tested, in that case we could wrap the static call of the static method in an instance method thus eliminating
the problem of having trouble about mocking the class. If the class we are attempting to test is the class with the static method then doing a partial mock is generally not a good 
unit testing practice. Another choice if possible would be to turn the static method into an instance method.
