<?php
session_start();

class AuthController {
public function login() {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
require_once 'models/UserModel.php';
$userModel = new UserModel();
$username = $_POST['username'];
$password = $_POST['password'];

$user = $userModel->login($username, $password);
if ($user) {
$_SESSION['user'] = $user['username'];
header("Location: index.php?controller=auth&action=dashboard");
exit;
} else {
$error = "Invalid username or password";
require_once 'views/login.php';
}
} else {
require_once 'views/login.php';
}
}

public function register() {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
require_once 'models/UserModel.php';
$userModel = new UserModel();
$username = $_POST['username'];
$password = $_POST['password'];

if ($userModel->register($username, $password)) {
header("Location: index.php?controller=auth&action=login");
exit;
} else {
$error = "Error registering user";
require_once 'views/register.php';
}
} else {

require_once 'views/register.php';
}
}

public function dashboard() {
if (isset($_SESSION['user'])) {
require_once 'views/dashboard.php';
} else {
header("Location: index.php?controller=auth&action=login");
}
}

public function logout() {
session_destroy();
header("Location: index.php?controller=auth&action=login");
}
}
?>