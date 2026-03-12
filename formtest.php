<?php
// Main heading for the results page
echo '<h1>Form input values</h1>';

// Show the visitor name safely
echo '<p>Your Name: ' . htmlspecialchars($_POST['visitor_name'] ?? '') . '</p>';

// Get the selected options from the form
$options = $_POST['options'] ?? [];

// Just in case PHP receives a single value, turn it into an array
if (!is_array($options)) {
  $options = [$options];
}

// Join the selected options together for display
echo '<p>Options: ' . htmlspecialchars(implode(', ', $options)) . '</p>';

// Print the full POST array for debugging
echo '<h2>All Form Data</h2>';
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>
