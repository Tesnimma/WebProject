<?php
require_once 'Database.php';

class Item {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function addItem($name) {
        $stmt = $this->db->prepare("INSERT INTO items (name) VALUES (?)");
        $stmt->execute([$name]);
    }

    public function deleteItem($id) {
        $stmt = $this->db->prepare("DELETE FROM items WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
