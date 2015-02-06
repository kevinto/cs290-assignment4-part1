<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (isset($_GET['logoff']) && $_GET['logoff'] === 'true') {
  session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <form action="https://web.engr.oregonstate.edu/~toke/a4/content1.php" method="post">
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