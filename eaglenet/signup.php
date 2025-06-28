<?php
$host = 'localhost';
$db   = 'eaglenet';
$user = 'root';
$pass = 'putracan2005';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Connect to the database
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get form input
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check password confirmation
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into DB
$sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$fullname, $email, $hashed_password]);

    // ✅ Redirect on success
    header("Location: home.html");
    exit();

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "This email is already registered.";
    } else {
        echo "Signup failed: " . $e->getMessage();
    }
}
?>
