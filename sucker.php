<?php
// These are the fields the user must complete
$required = ['name', 'section', 'cardnumber', 'cardtype'];

// Check each required field before doing anything else
foreach ($required as $field) {
  if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
    echo '<h1>Sorry</h1>';
    echo '<p>You did not fill out the form completely. <a href="buyagrade.html">Try again?</a></p>';
    exit;
  }
}

// Clean up the submitted values
$name = trim($_POST['name'] ?? '');
$section = trim($_POST['section'] ?? '');
$cardnumber = trim($_POST['cardnumber'] ?? '');
$cardtype = trim($_POST['cardtype'] ?? '');

// Show the raw POST data while testing
echo '<h1>Raw Form Data</h1>';
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Show the submitted values safely on the page
echo '<h1>Form input values</h1>';
echo '<p>Your Name: ' . htmlspecialchars($name) . '</p>';
echo '<p>Section: ' . htmlspecialchars($section) . '</p>';
echo '<p>Card Number: ' . htmlspecialchars($cardnumber) . '</p>';
echo '<p>Card Type: ' . htmlspecialchars($cardtype) . '</p>';

// Build one line of text to save into the file
$line = $name . ';' . $section . ';' . $cardnumber . ';' . $cardtype . PHP_EOL;

// Add the new record to the end of suckers.html
file_put_contents('suckers.html', $line, FILE_APPEND);

// Read everything currently stored in the file
$all = file_get_contents('suckers.html');

// Print the current file contents to confirm save worked
echo '<h2>The current database contains:</h2>';
echo '<pre>' . htmlspecialchars($all) . '</pre>';
?>
