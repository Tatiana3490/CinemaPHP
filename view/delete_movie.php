<?php
require_once '../config/config.php';

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $movieId = $_POST["movie_id"];
    $response = apiDelete("/movies/$movieId");

    $success = $response !== false;
    if (!$success) {
        $error = "❌ Failed to delete movie. Check if the ID exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Movie</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🗑️ Delete a Movie</h1>

<?php if ($success): ?>
    <p class="success">✅ Movie deleted successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="post" class="delete-form">
    <label>🎞️ Movie ID:
        <input type="number" name="movie_id" required>
    </label><br><br>

    <button type="submit" class="btn">❌ Delete Movie</button>
</form>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>
