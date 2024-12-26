<?php
require_once '../../controllers/BaseController.php';
$controller = new BaseController();
$cart = $controller->getCart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cart as $itemId => $quantity): ?>
                <li>Item ID: <?= htmlspecialchars($itemId) ?> - Quantity: <?= htmlspecialchars($quantity) ?></li>
            <?php endforeach; ?>
        </ul>
        <form method="POST" action="/public/index.php">
            <input type="hidden" name="action" value="clear_cart">
            <button type="submit">Clear Cart</button>
        </form>
    <?php endif; ?>
    <a href="/app/views/items/add.php">Add More Items</a>
</body>
</html>
