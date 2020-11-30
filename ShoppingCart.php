<?php


class ShoppingCart
{
    private $cart;

    /**
     * ShoppingCart constructor.
     */
    public function __construct()
    {
        $this->cart = [];
    }

    public function add(string $code_product, int $quantity)
    {
        $product       = $this->cart[$code_product] ?? null;
        $quantity_cart = $quantity;

        if (!empty($product)) {
            $quantity_cart = $product + $quantity;
        }

        $this->cart[$code_product] = $quantity_cart;
    }

    public function remove($code_product)
    {
        $product = $this->cart[$code_product] ?? null;
        $cart    = $this->cart;

        if (!empty($product)) {
            unset($cart[$code_product]);
        }

        $this->cart = $cart;
    }

    public function show()
    {
        echo json_encode($this->cart);
    }
}

$shopping = new ShoppingCart();

$shopping->add("Pisang Hijau", 2);
$shopping->add("Semangka Kuning", 3);
$shopping->add("Apel Merah", 1);
$shopping->add("Apel Merah", 4);
$shopping->add("Apel Merah", 2);
$shopping->remove("Semangka Kuning");
$shopping->remove("Semangka Merah");
$shopping->show();
