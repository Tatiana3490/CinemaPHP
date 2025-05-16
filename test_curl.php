<?php
require_once 'config/config.php';

$url = API_URL . "/movies";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);
echo "<pre>";
print_r($data);
echo "</pre>";
