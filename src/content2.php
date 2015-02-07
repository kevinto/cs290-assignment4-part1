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
	<title>Content2</title>
</head>
<body>
<?php

// Set up the redirect to content1 page
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "https://" . $_SERVER['HTTP_HOST'] . $filePath;
$content1Redirect = $redirect . '/content1.php';
$content1Redirect = "<a href=\"$content1Redirect\">here</a>";
echo "Click $content1Redirect to go back to content1";
?>
</body>
</html>