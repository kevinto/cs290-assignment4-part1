<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="multtable.css">
	<title>Multtable</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Checks Preconditions
if (!allGetParamsExist() || !paramsValidIntegers() || !minMaxValid()) {
  exit();
}

createMultTable();

// Checks if all GET parameters exist
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

    return false;
  }

  return true;
}

// Checks if the minimums are less than the maximums
function minMaxValid() {
  if ($_GET['min-multiplicand'] > $_GET['max-multiplicand'] ||$_GET['min-multiplier'] > $_GET['max-multiplier']) {
    echo "<p>Minimum [multiplicand|multiplier] larger than maximum.</p>";
    return false;
  }

  return true;
}

// Checks if all the GET params are valid integers
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

// Creates the multiplication table based on the GET parameters
function createMultTable() {
  $minMultiplicand = intval($_GET['min-multiplicand']);
  $maxMultiplicand = intval($_GET['max-multiplicand']);
  $minMultiplier = intval($_GET['min-multiplier']);
  $maxMultiplier = intval($_GET['max-multiplier']);

  $totalRows = $maxMultiplicand - $minMultiplicand + 2;
  $totalColumns = $maxMultiplier - $minMultiplier + 2;

  echo "<table>";

  for ($i = 0; $i < $totalRows; $i++) { 
    echo "<tr>";

    for ($j = 0; $j < $totalColumns; $j++) { 
      // Keep top left cell empty
      if ($i === 0 && $j === 0) {
        echo "<th>";
        continue;
      }

      $currMultiplicand = $minMultiplicand + ($i - 1);
      $currMultiplier = $minMultiplier + ($j - 1);

      if ($j === 0) {
        // Left column should be numbered from minMultiplicand to maxMultiplicand
        $displayValue = $currMultiplicand;
        echo "<th>$displayValue"; 
      }
      elseif ($i === 0) {
        // Topmost row should be numbered from minMultiplier to maxMultiplier
        $displayValue = $currMultiplier;
        echo "<th>$displayValue"; 
      }
      else {
        // Current cell displays the product
        $displayValue = $currMultiplicand * $currMultiplier;
        echo "<th>$displayValue"; 
      }
    }

    echo "</tr>";
  }

  echo "</table>";
}
?>
</body>
</html>