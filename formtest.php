<?php
// Get the submitted name safely
$visitorName = trim($_POST['visitor_name'] ?? '');

// Get the selected options from the form
$options = $_POST['options'] ?? [];

// Make sure the options value is always an array
if (!is_array($options)) {
  $options = [$options];
}

// Turn selected options into one readable string
$optionsText = implode(', ', $options);

// Capture the raw POST array as text
$arrayOutput = print_r($_POST, true);

// Build one saved record for the debug exercise
$record =
"<pre>" .
"Visitor Name: " . htmlspecialchars($visitorName) . "\n" .
"Selected Options: " . htmlspecialchars($optionsText) . "\n\n" .
"Raw Form Data:\n" .
htmlspecialchars($arrayOutput) .
"------------------------------\n" .
"</pre>\n";

// Save Exercise 1 data into the same file
file_put_contents('suckers.html', $record, FILE_APPEND);

// Read everything currently stored in the file
$all = file_get_contents('suckers.html');
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
      <p><strong>Your Name:</strong> <?= htmlspecialchars($visitorName) ?></p>
      <p><strong>Options:</strong> <?= htmlspecialchars($optionsText) ?></p>
    </div>

    <div class="panel">
      <h2>All Form Data</h2>
      <pre><?php print_r($_POST); ?></pre>
    </div>

    <div class="panel">
      <h2>The Current Database Contains</h2>
      <?= $all ?>
    </div>

    <p class="back-link">
      <a class="link-button" href="formtest.html">Back to Form Test</a>
    </p>
  </div>
</body>
</html>
