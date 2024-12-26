<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../app/controllers/BaseController.php';

$controller = new BaseController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    switch ($action) {
        case 'add_to_cart':
            $itemId = $_POST['item_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;
            if ($itemId) {
                $controller->addToCart($itemId, $quantity);
            }
            header('Location: /items/view_cart.php');
            exit;
        case 'remove_from_cart':
            $itemId = $_POST['item_id'] ?? null;
            if ($itemId) {
                $controller->removeFromCart($itemId);
            }
            header('Location: /items/view_cart.php');
            exit;
        default:
            echo "Invalid action.";
            exit;
    }
}
?>
