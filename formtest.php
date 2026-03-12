<?php
// Get the submitted name safely
$visitorName = htmlspecialchars($_POST['visitor_name'] ?? '');

// Get the selected options from the form
$options = $_POST['options'] ?? [];

// Just in case PHP receives only one value, convert it to an array
if (!is_array($options)) {
  $options = [$options];
}

// Convert the selected values into one display string
$optionsText = htmlspecialchars(implode(', ', $options));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Test Result</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="page">
    <h1>Form Input Values</h1>
    <p class="intro">
      This output confirms that multiple selected values were posted correctly.
    </p>

    <div class="panel">
      <p><strong>Your Name:</strong> <?= $visitorName ?></p>
      <p><strong>Options:</strong> <?= $optionsText ?></p>
    </div>

    <h2>All Form Data</h2>
    <pre><?php print_r($_POST); ?></pre>

    <p class="back-link">
      <a class="link-button" href="formtest.html">Back to Form Test</a>
    </p>
  </div>
</body>
</html>
