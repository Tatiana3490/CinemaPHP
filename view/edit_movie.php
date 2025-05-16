<?php
require_once '../config/config.php';

$movie = null;
$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["search"])) {
        $movieId = $_POST["movie_id"];
        $movie = apiGet("/movies/$movieId");
        if (!$movie) {
            $error = "❌ Movie not found.";
        }
    }

    if (isset($_POST["update"])) {
        $movieId = $_POST["movie_id"];
        $movieData = [
            "title" => $_POST["title"],
            "genre" => $_POST["genre"],
            "durationMinutes" => (int)$_POST["duration"],
            "releaseDate" => $_POST["release_date"],
            "currentlyShowing" => isset($_POST["currently_showing"])
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json",
                "method" => "PUT",
                "content" => json_encode($movieData)
            ]
        ];
        $context = stream_context_create($options);
        $response = @file_get_contents(API_BASE_URL . "/movies/$movieId", false, $context);
        $success = $response !== false;

        if (!$success) {
            $error = "❌ Failed to update movie.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>✏️ Edit Movie</h1>

<?php if ($success): ?>
    <p class="success">✅ Movie updated successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<div class="table-container">
    <form method="post" class="movie-table">
        <label>🎞️ Enter Movie ID:
            <input type="number" name="movie_id" required value="<?= $_POST["movie_id"] ?? '' ?>">
        </label>
        <br>
        <button type="submit" name="search" class="btn">🔍 Search Movie</button>
    </form>
</div>

<?php if ($movie): ?>
    <div class="table-container">
        <form method="post" class="movie-table">
            <input type="hidden" name="movie_id" value="<?= $movie["id"] ?>">

            <label>🎬 Title:
                <input type="text" name="title" required value="<?= htmlspecialchars($movie['title']) ?>">
            </label>

            <label>🎭 Genre:
                <input type="text" name="genre" required value="<?= htmlspecialchars($movie['genre']) ?>">
            </label>

            <label>⏱️ Duration (min):
                <input type="number" name="duration" required value="<?= $movie['durationMinutes'] ?>">
            </label>

            <label>📅 Release Date:
                <input type="date" name="release_date" required value="<?= $movie['releaseDate'] ?>">
            </label>

            <label>
                <input type="checkbox" name="currently_showing" <?= $movie['currentlyShowing'] ? 'checked' : '' ?>> Currently Showing
            </label>

            <button type="submit" name="update" class="btn">💾 Update Movie</button>
        </form>
    </div>
<?php endif; ?>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>
