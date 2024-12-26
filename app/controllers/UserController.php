<?php
require_once '../app/models/User.php';

class UserController extends BaseController {
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $user = new User();
            $user->addUser($username, $email, $password);
            header('Location: /LAB-WEB-main/public/index.php');
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = intval($_POST['user_id']);
            $user = new User();
            $user->deleteUser($userId);
            header('Location: /LAB-WEB-main/public/index.php');
        }
    }
}
?>
