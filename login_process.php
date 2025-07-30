<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Use prepared statements to prevent SQL injection
  $stmt = $conn->prepare("SELECT id, name FROM users WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['login_success'] = true;

    // Handle "Remember Me"
    if (isset($_POST['remember'])) {
      setcookie('remember_username', $username, time() + (86400 * 30), "/"); // 30 days
    } else {
      if (isset($_COOKIE['remember_username'])) {
        setcookie('remember_username', '', time() - 3600, "/"); // Expire cookie
      }
    }

    // Redirect to login page to show success message, then auto-redirect to dashboard
    header('Location: admin/login.php');
    exit();
  } else {
    $_SESSION['message'] = 'Invalid username or password';
    header('Location: admin/login.php');
    exit();
  }
}
?>
