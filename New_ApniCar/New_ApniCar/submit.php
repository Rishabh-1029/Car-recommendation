<?php
// Get form data
$seats = $_POST['seats'];
$price_range = $_POST['price_range'];
$avg_distance = $_POST['avg_distance'];
$location = $_POST['location'];
$fuel_type = $_POST['fuel_type'];

// Format data
$data = "Number of Seats: $seats\n";
$data .= "Price Range: $price_range\n";
$data .= "Average Distance Used (in KM): $avg_distance\n";
$data .= "Geographic Location: $location\n";
$data .= "Fuel Type: $fuel_type\n";

// Save data to file
$file = fopen("car_data.txt", "a");
fwrite($file, $data);
fclose($file);

// Redirect back to the form page
header("Location: index.html");
exit();
?>
