<?php
session_start();

// Redirect to login page if User tries to access content1.php without logging in first.
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_SESSION['username']) && !isset($_SESSION['visits'])) {
  header('Location: https://web.engr.oregonstate.edu/~toke/a4/login.php', true, 301);
  die();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Content1</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$logoutRedirect = '<a href="https://web.engr.oregonstate.edu/~toke/a4/login.php?logoff=true">here</a>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (count($_POST) <= 0 || $_POST === '' || $_POST === null || $_POST['username'] === null || $_POST['username'] === '') {
    echo 'A username must be entered. Click <a href="https://web.engr.oregonstate.edu/~toke/a4/login.php">here</a> to return to the login screen.';

    die();
  }
  else {
    if (session_status() == PHP_SESSION_ACTIVE) {
      $username = $_POST['username'];
      $_SESSION['username'] = $username;

      if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 0;
      }
      else {
        $_SESSION['visits']++;
      }

      echo "Hello $username you have visited this page $_SESSION[visits] times before. Click $logoutRedirect to logout.";

      die();
    }
  }
}

// Run logged in user's session when this page is accessed thru non-POSTs
if (session_status() == PHP_SESSION_ACTIVE) {
  if (isset($_SESSION['username']) && isset($_SESSION['visits'])) {
    $_SESSION['visits']++;

    echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before. Click $logoutRedirect to logout."; 
  }
  else
  {
    header('Location: https://web.engr.oregonstate.edu/~toke/a4/login.php', true, 301);
    die();
  }
}

?>
</body>
</html>