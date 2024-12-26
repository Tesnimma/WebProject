<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item to Cart</h1>
    <form method="POST" action="/public/index.php">
        <label for="item_id">Item ID:</label>
        <input type="text" id="item_id" name="item_id" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>
        <input type="hidden" name="action" value="add_to_cart">
        <button type="submit">Add to Cart</button>
    </form>
    <a href="/app/views/items/view_cart.php">View Cart</a>
</body>
</html>
