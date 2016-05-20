<?php

namespace Desafio;

use Desafio\Coffee;

/**
 * @author Jean Carlo Machado <contato@jeancarlomachado.com.br>
 */
class CoffeeTest extends \PHPUnit_Framework_TestCase
{
    public function testDrinkCoffeeMakesItEmpty()
    {
        $coffee = new Coffee;
        $coffee->drink();

        static::assertFalse($coffee->hasCoffee());
    }

    public function testAfterRefillCoffeeIsNotEmpty()
    {
        $coffee = new Coffee;
        $coffee->refill();

        static::assertTrue($coffee->hasCoffee());
    }

    public function testCoffeeIsRefilledWhenItsEmpty()
    {
        $coffee = $this->getMockBuilder(Coffee::class)
            ->setMethods(['refill'])
            ->setConstructorArgs([false])
            ->getMock();

        $coffee->expects($this->once())->method('refill');
        $coffee->programmersLife();
    }

    public function testCoffeeIsNotRefilledWhenItsNotEmpty()
    {
        $coffee = $this->getMockBuilder(Coffee::class)
            ->setMethods(['refill'])
            ->getMock();

        $coffee->expects($this->never())->method('refill');
        $coffee->programmersLife();
    }


}

