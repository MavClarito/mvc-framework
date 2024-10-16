<?php
if (isset($_GET['controller']) && isset($_GET['action'])) {
$controller = $_GET['controller'];

$action = $_GET['action'];
} else {
$controller = 'auth';
$action = 'login';
}

require_once 'controllers/AuthController.php';
$authController = new AuthController();

if ($controller == 'auth' && $action == 'login') {
$authController->login();
} elseif ($controller == 'auth' && $action == 'register') {
$authController->register();
} elseif ($controller == 'auth' && $action == 'dashboard') {
$authController->dashboard();
} elseif ($controller == 'auth' && $action == 'logout') {
$authController->logout();
} else {
echo "Invalid request!";
}
?>