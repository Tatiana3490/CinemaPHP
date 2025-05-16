<?php
require_once __DIR__ . '/../config/config.php';

class MovieFormController {
    public function index() {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'genre' => $_POST['genre'],
                'durationMinutes' => (int) $_POST['durationMinutes'],
                'releaseDate' => $_POST['releaseDate'],
                'currentlyShowing' => $_POST['currentlyShowing'] === 'true'
            ];

            $options = [
                'http' => [
                    'header'  => "Content-type: application/json",
                    'method'  => 'POST',
                    'content' => json_encode($data)
                ]
            ];

            $context = stream_context_create($options);
            $result = @file_get_contents(API_URL . '/films', false, $context);

            if ($result !== false) {
                $message = "Movie saved successfully!";
            } else {
                $message = "Failed to save the movie. Please try again.";
            }
        }

        include __DIR__ . '/../view/MovieFormView.php';
    }
}
?>
