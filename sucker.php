<?php
// These are the fields the user must complete
$required = ['name', 'section', 'cardnumber', 'cardtype'];

// Check each required field before saving anything
foreach ($required as $field) {
  if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Form Error</title>
      <link rel="stylesheet" href="styles.css">
    </head>
    <body>
      <div class="page">
        <h1 class="status-error">Sorry</h1>
        <p class="intro">
          You did not fill out the form completely.
        </p>
        <p>
          <a class="link-button" href="buyagrade.html">Try Again</a>
        </p>
      </div>
    </body>
    </html>
    <?php
    exit;
  }
}

// Clean the submitted values
$name = trim($_POST['name'] ?? '');
$section = trim($_POST['section'] ?? '');
$cardnumber = trim($_POST['cardnumber'] ?? '');
$cardtype = trim($_POST['cardtype'] ?? '');

// Build a more readable vertical format for the database file
$line =
"Name: $name\n" .
"Section: $section\n" .
"Card Number: $cardnumber\n" .
"Card Type: $cardtype\n\n";

// Add the new record to the end of suckers.html
file_put_contents('suckers.html', $line, FILE_APPEND);

// Read everything currently stored in the file
$all = file_get_contents('suckers.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buy A Grade Result</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="page">
    <h1 class="status-success">Thanks, Sucker!</h1>
    <p class="intro">
      Your form was submitted successfully and your record was added to the file.
    </p>

    <div class="panel">
      <h2>Form Input Values</h2>
      <p><strong>Your Name:</strong> <?= htmlspecialchars($name) ?></p>
      <p><strong>Section:</strong> <?= htmlspecialchars($section) ?></p>
      <p><strong>Card Number:</strong> <?= htmlspecialchars($cardnumber) ?></p>
      <p><strong>Card Type:</strong> <?= htmlspecialchars($cardtype) ?></p>
    </div>

    <div class="panel">
      <h2>Raw Form Data</h2>
      <pre><?php print_r($_POST); ?></pre>
    </div>

    <div class="panel">
      <h2>The Current Database Contains</h2>
      <pre><?= htmlspecialchars($all) ?></pre>
    </div>

    <p class="back-link">
      <a class="link-button" href="buyagrade.html">Submit Another Entry</a>
    </p>
  </div>
</body>
</html>
