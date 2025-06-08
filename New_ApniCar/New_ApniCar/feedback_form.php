<?php
$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$message = $_POST['message'];

$data = "Name: $name\nEmail: $email\nContact Number: $contact_number\nMessage: $message\n\n";

$file_path = 'feedback.txt';

$file = fopen($file_path, 'a');

if ($file) {
    fwrite($file, $data);
    
    fclose($file);
    
    header("Location: index.html#contact");
    exit();
} else {
    exit();
}
?>
