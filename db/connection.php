<?php
require 'vendor/autoload.php'; // Composer autoload

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->ibuanak; // Nama database
    $collection = $database->ibuanak;  // Nama koleksi
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
