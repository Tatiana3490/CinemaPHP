<?php
require_once '../config/config.php';

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $screeningId = $_POST["screening_id"];
    $response = apiDelete("/screenings/$screeningId");

    $success = $response !== false;
    if (!$success) {
        $error = "❌ Failed to delete screening. Check if the ID exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Screening</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🗑️ Delete a Screening</h1>

<?php if ($success): ?>
    <p class="success">✅ Screening deleted successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="post" class="delete-form">
    <label>🎟️ Screening ID:
        <input type="number" name="screening_id" required>
    </label><br><br>

    <button type="submit" class="btn">❌ Delete Screening</button>
</form>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>
