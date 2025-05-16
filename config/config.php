<?php
define('API_BASE_URL', 'http://localhost:8080');

function apiGet($endpoint) {
    $url = API_BASE_URL . $endpoint;
    $response = @file_get_contents($url);
    return $response !== false ? json_decode($response, true) : [];
}

function apiPost($endpoint, $data) {
    $options = [
        "http" => [
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => json_encode($data)
        ]
    ];
    $context = stream_context_create($options);
    return @file_get_contents(API_BASE_URL . $endpoint, false, $context);
}
