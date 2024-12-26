<?php
class BaseController {
    private $cartCookie = 'user_cart';

    public function __construct() {
        // Initialize the cart cookie if it doesn't exist
        if (!isset($_COOKIE[$this->cartCookie])) {
            setcookie($this->cartCookie, json_encode([]), time() + (86400 * 30), "/", "", true, true);
        }
    }

    public function addToCart($itemId, $quantity = 1) {
        $cart = $this->getCart();
        if (isset($cart[$itemId])) {
            $cart[$itemId] += $quantity;
        } else {
            $cart[$itemId] = $quantity;
        }
        $this->saveCart($cart);
    }

    public function removeFromCart($itemId) {
        $cart = $this->getCart();
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
        }
        $this->saveCart($cart);
    }

    public function getCart() {
        return isset($_COOKIE[$this->cartCookie]) ? json_decode($_COOKIE[$this->cartCookie], true) : [];
    }

    public function clearCart() {
        setcookie($this->cartCookie, json_encode([]), time() + (86400 * 30), "/", "", true, true);
    }

    private function saveCart($cart) {
        setcookie($this->cartCookie, json_encode($cart), time() + (86400 * 30), "/","", true, true);
    }
}
?>
