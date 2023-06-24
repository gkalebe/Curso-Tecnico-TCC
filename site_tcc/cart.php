<?php
class Cart
{
    private $items;

    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->items = $_SESSION['cart'];
    }

    public function add($product)
    {
        $productId = $product->getId();
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity']++;
        } else {
            $this->items[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        $_SESSION['cart'] = $this->items;
    }

    public function remove($productId)
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
            $_SESSION['cart'] = $this->items;
        }
    }

    public function getItems()
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $item['product'];
        }
        return $items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }
}
?>
