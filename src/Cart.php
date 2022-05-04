<?php

namespace Shopping;

class Cart
{
    public array $items = [];

    public function addProduct(Product $product): void
    {
        if (in_array($product->id, $this->items)) {
            return;
        }

        $this->items[] = $product;
    }

    public function getTotal(User $user): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->price;
        }

        if ($user->contractLength !== 12) {
            return $total;
        }

        return $total - $total * 0.10;
    }
}