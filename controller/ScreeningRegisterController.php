<?php
session_start();
require_once(dirname(__DIR__) . "/config/config.php");

// === REGISTER NEW SCREENING ===
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $screeningTime = isset($_POST["screeningTime"]) ? $_POST["screeningTime"] : '';
    $theaterRoom = isset($_POST["theaterRoom"]) ? trim($_POST["theaterRoom"]) : '';
    $ticketPrice = isset($_POST["ticketPrice"]) ? (float) $_POST["ticketPrice"] : 0;
    $subtitled = isset($_POST["subtitled"]) ? $_POST["subtitled"] : '';
    $movieId = isset($_POST["movieId"]) ? (int) $_POST["movieId"] : 0;

    // Validation
    if (empty($screeningTime) || empty($theaterRoom) || $ticketPrice <= 0 || $movieId <= 0) {
        $_SESSION["error_screening"] = "All fields are required.";
        header("Location: ../index.php?page=add-screening");
        exit;
    }

    // Format data for API
    $data = [
        "screeningTime" => $screeningTime,
        "theaterRoom" => $theaterRoom,
        "ticketPrice" => $ticketPrice,
        "subtitled" => $subtitled === 'true',
        "movieId" => $movieId
    ];

    $options = [
        "http" => [
            "header"  => "Content-type: application/json",
            "method"  => "POST",
            "content" => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);

    try {
        $response = @file_get_contents(API_URL . "/screenings", false, $context);

        if ($response !== false) {
            $_SESSION["mensaje_screening"] = "✅ Screening successfully registered.";
        } else {
            $_SESSION["error_screening"] = "❌ Failed to connect to the API.";
        }

    } catch (Exception $e) {
        $_SESSION["error_screening"] = "❌ Internal error. Please try again later.";
        error_log("Error registering screening: " . $e->getMessage());
    }

    header("Location: ../index.php?page=add-screening");
    exit;

    include __DIR__ . '/../view/ScreeningRegisterView.php';

}
