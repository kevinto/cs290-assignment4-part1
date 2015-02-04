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

if (!allGetParamsExist() || !paramsValidIntegers() || !minMaxValid()) {
  exit();
}

createMultTable();

echo "test me";

function allGetParamsExist() {
  if (!isset($_GET['min-multiplicand']) || !isset($_GET['max-multiplicand']) || !isset($_GET['min-multiplier']) || !isset($_GET['max-multiplier'])) {

    if (!isset($_GET['min-multiplicand'])) {
      echo "<p>Missing parameter [min-multiplicand].</p>";
    }
     
    if (!isset($_GET['max-multiplicand'])) {
      echo "<p>Missing parameter [max-multiplicand].</p>";
    }

    if (!isset($_GET['min-multiplier'])) {
      echo "<p>Missing parameter [min-multiplier].</p>";
    }

    if (!isset($_GET['max-multiplier'])) {
      echo "<p>Missing parameter [max-multiplier].</p>";
    }

    // $minMultiplicand = $_GET['min-multiplicand'];

    // echo "<p>The first param(min-multiplicand) value is: $minMultiplicand. \n</p>";
    // echo "<p>The first param(min-multiplicand) value is: $minMultiplicand. \n</p>";
    return false;
  }

  return true;
}

function minMaxValid() {
  if ($_GET['min-multiplicand'] > $_GET['max-multiplicand'] ||$_GET['min-multiplier'] > $_GET['max-multiplier']) {
    echo "<p>Minimum [multiplicand|multiplier] larger than maximum.</p>";
    return false;
  }

  return true;
}

function paramsValidIntegers() {
  $isValid = true;

  if (!ctype_digit($_GET['min-multiplicand'])) {
    echo "<p>[min-multiplicand] must be an integer.</p>";
    $isValid = false;
  }
 
  if (!ctype_digit($_GET['max-multiplicand'])) {
    echo "<p>[max-multiplicand] must be an integer.</p>";
    $isValid = false;
  } 
    
  if (!ctype_digit($_GET['min-multiplier'])) {
    echo "<p>[min-multiplier] must be an integer.</p>";
    $isValid = false;
  }

  if (!ctype_digit($_GET['max-multiplier'])) {
    echo "<p>[max-multiplier] must be an integer.</p>";
    $isValid = false;
  }

  return $isValid;
}

function createMultTable() {

}
?>
</body>
</html>