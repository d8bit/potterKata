<?php

require_once 'src/Basket.php';

class BasketTest extends PHPUnit_Framework_TestCase
{

    public function testGetBooksNumber()
    {
        $basket = new Basket();
        $basket->addBook('book1');
        $this->assertEquals(1, $basket->getBooksNumber());
        $basket->addBook('book2');
        $this->assertEquals(2, $basket->getBooksNumber());
        $basket->addBook('book2');
        $this->assertEquals(3, $basket->getBooksNumber());
    }

    public function testGetTotal()
    {
        $basket = new Basket();
        $basket->addBook('book1');
        $this->assertEquals(8, $basket->getTotal());
        $basket->addBook('book2');
        $expect = 2 * 8 * 0.95;
        $this->assertEquals($expect, $basket->getTotal());
        $basket->addBook('book3');
        $expect = 3 * 8 * 0.90;
        $this->assertEquals($expect, $basket->getTotal());
        $basket->addBook('book4');
        $expect = 4 * 8 * 0.80;
        $this->assertEquals($expect, $basket->getTotal());
        $basket->addBook('book5');
        $expect = 5 * 8 * 0.75;
        $this->assertEquals($expect, $basket->getTotal());
        $basket->addBook('book5');
        $expect = (5 * 8 * 0.75) + 8;
        $this->assertEquals($expect, $basket->getTotal());
        $basket->addBook('book5');
        $expect = 1 + (5 * 8 * 0.75) + (2*8);
        $this->assertEquals($expect, $basket->getTotal());
    }

    public function testPete()
    {
        $basket = new Basket();
        $basket->addBook('book1');
        $basket->addBook('book1');
        $basket->addBook('book2');
        $expect = 0;
        $this->assertEquals($expect, $basket->getBooksNumber());
    }

    public function testKata()
    {
        // 2 copies of the first book
        // 2 copies of the second book
        // 2 copies of the third book
        // 1 copy of the fourth book
        // 1 copy of the fifth book
        $basket = new Basket();
        $basket->addBook('book1');
        $basket->addBook('book1');
        $basket->addBook('book2');
        $basket->addBook('book2');
        $basket->addBook('book3');
        $basket->addBook('book3');
        $basket->addBook('book4');
        $basket->addBook('book5');
        // $expect = 2 * (8 * 4 * 0.8);
        // $this->assertEquals($basket->getTotal(), $expect);
    }

}

