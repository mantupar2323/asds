<?php
// Run ONCE in the browser after importing the SQL files, then DELETE this file.
require_once 'config/db.php';
if ($pdo->query("SELECT COUNT(*) FROM users")->fetchColumn() > 0) die('Users already exist. Delete setup_admin.php.');
$pdo->prepare("INSERT INTO users (username, password_hash, role) VALUES ('admin', ?, 'Admin')")->execute([password_hash('admin123', PASSWORD_DEFAULT)]);
echo 'Created admin / admin123. Change the password and delete this file.';
