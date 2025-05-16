<?php
define('API_BASE_URL', 'http://localhost:8080');

// GET request
function apiGet($endpoint) {
    $url = API_BASE_URL . $endpoint;
    $response = @file_get_contents($url);
    return $response !== false ? json_decode($response, true) : [];
}

// POST request
function apiPost($endpoint, $data) {
    $options = [
        "http" => [
            "header"  => "Content-Type: application/json",
            "method"  => "POST",
            "content" => json_encode($data)
        ]
    ];
    $context = stream_context_create($options);
    return @file_get_contents(API_BASE_URL . $endpoint, false, $context);
}

// PUT request
function apiPut($endpoint, $data) {
    $options = [
        "http" => [
            "header"  => "Content-Type: application/json",
            "method"  => "PUT",
            "content" => json_encode($data)
        ]
    ];
    $context = stream_context_create($options);
    return @file_get_contents(API_BASE_URL . $endpoint, false, $context);
}

// DELETE request
function apiDelete($endpoint) {
    $options = [
        "http" => [
            "method" => "DELETE"
        ]
    ];
    $context = stream_context_create($options);
    return @file_get_contents(API_BASE_URL . $endpoint, false, $context);
}
