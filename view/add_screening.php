<?php
require_once '../config/config.php';

$success = false;
$error = "";

// Obtener las películas para el selector
$movies = apiGet('/movies');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $screeningData = [
        "screeningTime" => $_POST["screening_time"],
        "theaterRoom" => $_POST["theater_room"],
        "ticketPrice" => (float)$_POST["ticket_price"],
        "subtitled" => isset($_POST["subtitled"]),
        "movieId" => (int)$_POST["movie_id"]
    ];

    $response = apiPost('/screenings', $screeningData);
    $success = $response !== false;
    if (!$success) {
        $error = "❌ Failed to add screening. Check API or input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Screening</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🎟️ Add a New Screening</h1>

<?php if ($success): ?>
    <p class="success">✅ Screening added successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <label>📅 Date & Time (yyyy-MM-ddTHH:mm:ss):
        <input type="text" name="screening_time" required placeholder="2025-06-01T20:30:00">
    </label>

    <label>🏛️ Theater Room:
        <input type="text" name="theater_room" required>
    </label>

    <label>💰 Ticket Price (€):
        <input type="number" name="ticket_price" step="0.01" min="0" required>
    </label>

    <label>
        <input type="checkbox" name="subtitled"> Subtitled
    </label>

    <label>🎞️ Movie:
        <select name="movie_id" required>
            <option value="">-- Select a movie --</option>
            <?php foreach ($movies as $movie): ?>
                <option value="<?= $movie['id'] ?>"><?= htmlspecialchars($movie['title']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>

    <button type="submit">➕ Add Screening</button>
</form>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>
