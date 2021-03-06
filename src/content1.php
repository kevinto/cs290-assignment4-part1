<?php
session_start();

// Redirect to login page if User tries to access content1.php without logging in first.
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_SESSION['username']) && !isset($_SESSION['visits'])) {
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/', $filePath);
  $redirect = "https://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: $redirect/login.php", true, 301);
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

// Setup the redirects to logout and to the content2 page
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "https://" . $_SERVER['HTTP_HOST'] . $filePath;
$logoutRedirect = $redirect . '/login.php?logoff=true';
$logoutRedirect = "<a href=\"$logoutRedirect\">here</a>";
$content2Redirect = $redirect . '/content2.php';
$content2Redirect = "<a href=\"$content2Redirect\">here</a>";

// Set up the login cookie info if the correct info is passed in via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (count($_POST) <= 0 || $_POST === '' || $_POST === null || $_POST['username'] === null || $_POST['username'] === '') {
    // The incorrect parameters were passed in..
    echo "A username must be entered. Click <a href=\"$redirect/login.php\">here</a> to return to the login screen.";

    die();
  }
  else {
    if (session_status() == PHP_SESSION_ACTIVE) {
      // This is a valid login session
      
      $username = $_POST['username'];
      $_SESSION['username'] = $username;

      if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 0;
      }
      else {
        $_SESSION['visits']++;
      }

      echo "Hello $username you have visited this page $_SESSION[visits] times before. Click $logoutRedirect to logout.<br>";
      echo "Click $content2Redirect to go to content2";
      die();
    }
  }
}

// Run logged in user's session when this page is accessed thru non-POSTs
if (session_status() == PHP_SESSION_ACTIVE) {
  if (isset($_SESSION['username']) && isset($_SESSION['visits'])) {
    $_SESSION['visits']++;

    echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before. Click $logoutRedirect to logout.<br>"; 
    echo "Click $content2Redirect to go to content2";
  }
}

?>
</body>
</html>