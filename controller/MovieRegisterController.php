<?php
session_start();
require_once(dirname(__DIR__) . "/config/config.php");

// === REGISTER NEW MOVIE ===
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : '';
    $genre = isset($_POST["genre"]) ? trim($_POST["genre"]) : '';
    $durationMinutes = isset($_POST["durationMinutes"]) ? (int) $_POST["durationMinutes"] : 0;
    $releaseDate = isset($_POST["releaseDate"]) ? $_POST["releaseDate"] : '';
    $currentlyShowing = isset($_POST["currentlyShowing"]) ? $_POST["currentlyShowing"] : '';

    // Validation
    if (empty($title) || empty($genre) || $durationMinutes <= 0 || empty($releaseDate)) {
        $_SESSION["error_pelicula"] = "All fields are required.";
        header("Location: ../index.php?page=add-movie");
        exit;
    }

    // Build request data
    $data = [
        "title" => $title,
        "genre" => $genre,
        "durationMinutes" => $durationMinutes,
        "releaseDate" => $releaseDate,
        "currentlyShowing" => $currentlyShowing === 'true'
    ];

    // Prepare HTTP POST with stream context
    $options = [
        "http" => [
            "header"  => "Content-type: application/json",
            "method"  => "POST",
            "content" => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);

    try {
        $response = @file_get_contents(API_URL . "/movies", false, $context);

        if ($response !== false) {
            $_SESSION["mensaje_pelicula"] = "✅ Movie successfully registered.";
        } else {
            $_SESSION["error_pelicula"] = "❌ Failed to connect to the API.";
        }

    } catch (Exception $e) {
        $_SESSION["error_pelicula"] = "❌ Internal error. Please try again later.";
        error_log("Error registering movie: " . $e->getMessage());
    }

    header("Location: ../index.php?page=add-movie");
    exit;
}
