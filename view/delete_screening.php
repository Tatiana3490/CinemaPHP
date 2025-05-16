<?php
require_once '../config/config.php';

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $screeningId = $_POST["screening_id"];
    $endpoint = '/screenings/' . $screeningId;

    $options = [
        "http" => [
            "method" => "DELETE"
        ]
    ];
    $context = stream_context_create($options);
    $response = @file_get_contents(API_BASE_URL . $endpoint, false, $context);

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
<h1>❌ Delete a Screening</h1>

<?php if ($success): ?>
    <p class="success">✅ Screening deleted successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <label>Screening ID:
        <input type="number" name="screening_id" required>
    </label><br><br>

    <button type="submit">❌ Delete Screening</button>
</form>

<br>
<a href="../index.php">🔙 Back to Menu</a>
</body>
</html>
