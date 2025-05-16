<?php
require_once '../config/config.php';

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $movieData = [
        "title" => $_POST["title"],
        "genre" => $_POST["genre"],
        "durationMinutes" => (int)$_POST["duration"],
        "releaseDate" => $_POST["release_date"],
        "currentlyShowing" => isset($_POST["currently_showing"])
    ];

    $response = apiPost('/movies', $movieData);
    $success = $response !== false;
    if (!$success) {
        $error = "❌ Failed to add movie. Check API or input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Add a New Movie</h1>

<?php if ($success): ?>
    <p class="success">✅ Movie added successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <label>Title: <input type="text" name="title" required></label><br><br>
    <label>Genre: <input type="text" name="genre" required></label><br><br>
    <label>Duration (min): <input type="number" name="duration" min="1" required></label><br><br>
    <label>Release Date: <input type="date" name="release_date" required></label><br><br>
    <label><input type="checkbox" name="currently_showing"> Currently Showing</label><br><br>
    <button type="submit">➕ Add Movie</button>
</form>

<br>
<a href="../index.php">🔙 Back to Menu</a>
</body>
</html>
