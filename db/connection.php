<?php
require 'vendor/autoload.php'; // Composer autoload

try {
    $client = new MongoDB\Client("mongodb+srv://devianz:ESiCixbvhJ71Gkwh@basdatnr9.qni60.mongodb.net/");
    $database = $client->posyandu; // Nama database
    $collection = $database->warga;  // Nama koleksi
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
