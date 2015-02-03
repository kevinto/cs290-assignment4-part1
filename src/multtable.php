<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
	<title>Multtable</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_GET['min-multiplicand']) || !isset($_GET['max-multiplicand']) || !isset($_GET['min-multiplier']) || !isset($_GET['max-multiplier'])) {
  echo "<p>You are missing the following GET parameter(s):";

  if (!isset($_GET['min-multiplicand'])) {
    echo "<br>min-multiplicand";
  }
   
  if (!isset($_GET['max-multiplicand'])) {
    echo "<br>max-multiplicand";
  }

  if (!isset($_GET['min-multiplier'])) {
    echo "<br>min-multiplier";
  }

  if (!isset($_GET['max-multiplier'])) {
    echo "<br>max-multiplier";
  }

  // $minMultiplicand = $_GET['min-multiplicand'];

  // echo "<p>The first param(min-multiplicand) value is: $minMultiplicand. \n</p>";
  // echo "<p>The first param(min-multiplicand) value is: $minMultiplicand. \n</p>";

  echo "</p>";
}

?>
</body>
</html>