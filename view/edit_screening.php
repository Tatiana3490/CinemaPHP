<?php
require_once '../config/config.php';

$screening = null;
$movies = apiGet('/movies');
$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["search"])) {
        $id = $_POST["screening_id"];
        $screening = apiGet("/screenings/$id");

        if (!$screening) {
            $error = "❌ Screening not found.";
        }
    }

    if (isset($_POST["update"])) {
        $id = $_POST["screening_id"];
        $screeningData = [
            "screeningTime" => $_POST["screening_time"],
            "theaterRoom" => $_POST["theater_room"],
            "ticketPrice" => (float)$_POST["ticket_price"],
            "subtitled" => isset($_POST["subtitled"]),
            "movieId" => (int)$_POST["movie_id"]
        ];

        $response = apiPut("/screenings/$id", $screeningData);
        $success = $response !== false;

        if (!$success) {
            $error = "❌ Failed to update screening.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Screening</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🖏️ Edit Screening</h1>

<?php if ($success): ?>
    <p class="success">✅ Screening updated successfully!</p>
<?php elseif ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<div class="table-container">
    <form method="post" class="movie-table">
        <label>🎟️ Enter Screening ID:
            <input type="number" name="screening_id" required value="<?= isset($_POST["screening_id"]) ? $_POST["screening_id"] : '' ?>">
        </label>
        <br>
        <button type="submit" name="search" class="btn">🔍 Search Screening</button>
    </form>
</div>

<?php if ($screening): ?>
    <div class="table-container">
        <form method="post" class="movie-table">
            <input type="hidden" name="screening_id" value="<?= $screening['id'] ?>">

            <label>📅 Date & Time:
                <input type="text" name="screening_time" required value="<?= $screening['screeningTime'] ?>">
            </label>

            <label>🏩 Theater Room:
                <input type="text" name="theater_room" required value="<?= htmlspecialchars($screening['theaterRoom']) ?>">
            </label>

            <label>💰 Ticket Price (€):
                <input type="number" name="ticket_price" step="0.01" min="0" required value="<?= $screening['ticketPrice'] ?>">
            </label>

            <label>
                <input type="checkbox" name="subtitled" <?= $screening['subtitled'] ? 'checked' : '' ?>> Subtitled
            </label>

            <label>🎮 Movie:
                <select name="movie_id" required>
                    <option value="">-- Select a movie --</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?= $movie['id'] ?>" <?= ($movie['title'] == $screening['movieTitle']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($movie['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <button type="submit" name="update" class="btn">💾 Update Screening</button>
        </form>
    </div>
<?php endif; ?>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>