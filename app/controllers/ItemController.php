<?php
require_once '../app/models/Item.php';

class ItemController extends BaseController {
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemName = htmlspecialchars($_POST['item_name']);
            $item = new Item();
            $item->addItem($itemName);
            header('Location: /project/public/index.php');
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemId = intval($_POST['item_id']);
            $item = new Item();
            $item->deleteItem($itemId);
            header('Location: /project/public/index.php');
        }
    }
}
?>
