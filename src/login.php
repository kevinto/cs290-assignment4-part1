<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (isset($_GET['logoff']) && $_GET['logoff'] === 'true') {
  $_SESSION = array();
  session_destroy();
}

$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "https://" . $_SERVER['HTTP_HOST'] . $filePath;
$contentRedirect = $redirect . '/content1.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <form action=<?=$contentRedirect?> method="post">
    <fieldset>
      <label>User Name: </label>
      <input type="text" name="username"><br>
    </fieldset>
    <fieldset>
      <input type="submit" value="Login">
    </fieldset>
  </form>
</body>
</html>