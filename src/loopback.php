<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="multtable.css">
	<title>Loopback</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Work with GET calls
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (count($_GET) <= 0) {
    // Output message for GET call with no params
    $getValues = array('Type' => 'GET', 'parameters' => null);
    echo "No GET parameters were passed in...<br>";
  }
  else {
    // Create custom GET array
    $getValues = array('Type' => 'GET', 'parameters' => $_GET);
  }

  // Output JSON object
  echo json_encode($getValues);
  echo '<br>';

  // Check if any parameter values are null
  $paramsContainNulls = false;
  $nullParams = array();
  foreach ($_GET as $key => $value) {
    if ($value === "")
    {
      $nullParams[] = $key;
      $paramsContainNulls = true;
    }
  }

  // Output message for null params
  if ($paramsContainNulls) {
    echo "Null parameters passed in: ";
    echo implode(", ", $nullParams);
  }
}

// Work with POST calls
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (count($_POST) <= 0) {
    // Output message for POST call with no params
    $postValues = array('Type' => 'POST', 'parameters' => null);
    echo "No POST parameters were passed in...<br>";
  }
  else {
    // Create custom POST array
    $postValues = array('Type' => 'POST', 'parameters' => $_POST);
  }

  // Output JSON object
  echo json_encode($postValues);
  echo '<br>';

  // Check if any parameter values are null
  $paramsContainNulls = false;
  $nullParams = array();
  foreach ($_POST as $key => $value) {
    if ($value === "")
    {
      $nullParams[] = $key;
      $paramsContainNulls = true;
    }
  }

  // Output message for null params
  if ($paramsContainNulls) {
    echo "Null parameters passed in: ";
    echo implode(", ", $nullParams);
  }
}
?>
</body>
</html>