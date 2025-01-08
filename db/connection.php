<?php
require 'vendor/autoload.php'; // Composer autoload

try {
    $client = new MongoDB\Client("mongodb://localhost:27017/");
    $database = $client->posyandu; // Nama database
    $collection = $database->warga;  // Nama koleksi
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
