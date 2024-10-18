
<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'otp_mining');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['telegram_username'];
    $password = $_POST['password'];

    if (isset($_POST['register'])) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, balance) VALUES (?, ?, 0)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        echo "Registration successful!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.html");
        } else {
            echo "Invalid login!";
        }
    }
}
?>
    