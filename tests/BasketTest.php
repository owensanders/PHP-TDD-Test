<?php

namespace Shopping\Test;

use PHPUnit\Framework\TestCase;
use Shopping\Cart;
use Shopping\Product;
use Shopping\User;

class BasketTest extends TestCase
{
    public function test_can_add_product_to_basket()
    {
        $product = new Product('P001', 'Photography', 200);
        $cart = new Cart;
        $cart->addProduct($product);

        $this->assertCount(1, $cart->items);
    }

    public function test_each_product_can_only_be_added_once()
    {
        //Add first product
        $product = new Product('P001', 'Photography', 200);
        $cart = new Cart;
        $cart->addProduct($product);
        $this->assertCount(1, $cart->items);

        //Attempt to add same product again
        $product = new Product('P001', 'Photography', 200);
        $cart = new Cart;
        $cart->addProduct($product);

        $this->assertCount(1, $cart->items);
    }

    public function test_can_add_total_items_price_without_discount()
    {
        $user = new User(10);
        $product1 = new Product('P001', 'Photography', 200);
        $product2 = new Product('P002', 'Floorplan', 100);
        $product3 = new Product('P003', 'Gas Certificate', 83.50);
        $product4 = new Product('P004', 'EICR Certificate', 51);

        $cart = new Cart;

        $cart->addProduct($product1);
        $cart->addProduct($product2);
        $cart->addProduct($product3);
        $cart->addProduct($product4);

        $this->assertEquals(434.50, $cart->getTotal($user));
    }

    public function test_can_add_total_items_price_with_discount()
    {
        $user = new User(12);
        $product1 = new Product('P001', 'Photography', 200);
        $product2 = new Product('P002', 'Floorplan', 100);
        $product3 = new Product('P003', 'Gas Certificate', 83.50);
        $product4 = new Product('P004', 'EICR Certificate', 51);

        $cart = new Cart;

        $cart->addProduct($product1);
        $cart->addProduct($product2);
        $cart->addProduct($product3);
        $cart->addProduct($product4);

        $this->assertEquals(391.05, $cart->getTotal($user));
    }
}