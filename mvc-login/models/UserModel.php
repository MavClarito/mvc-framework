<?php
class UserModel {
private $connection;

public function __construct() {
// Database connection
$this->connection = new mysqli("localhost", "root", "", "mvc_login");
if ($this->connection->connect_error) {
die("Connection failed: " . $this->connection->connect_error);
}
}

// Register a new user
public function register($username, $password) {
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $this->connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $passwordHash);
return $stmt->execute();
}

// Check if a user exists and verify password
public function login($username, $password) {
$stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

$user = $result->fetch_assoc();
if (password_verify($password, $user['password'])) {
return $user;
}
}
return false;
}

public function __destruct() {
$this->connection->close();
}
}
?>