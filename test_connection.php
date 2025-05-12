
<?php
require './src/config/database.php';
$host = 'localhost';
$db = 'blog'; // Ensure this matches your database name
$user = 'root'; // Default XAMPP username
$pass = '';     // Default XAMPP password (empty by default)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'src/config/database.php';

if (isset($conn)) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}
?>