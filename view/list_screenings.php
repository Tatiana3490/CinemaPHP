<?php
require_once '../config/config.php';
$screenings = apiGet('/screenings');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Screening List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🎟️ Screening List</h1>

<?php if (empty($screenings)): ?>
    <p class="error">⚠️ No screenings found or failed to load data from API.</p>
<?php else: ?>
    <div class="table-container">
        <table class="movie-table">
            <thead>
            <tr>
                <th>📅 Date & Time</th>
                <th>🏛️ Room</th>
                <th>💰 Price</th>
                <th>🔤 Subtitled</th>
                <th>🎞️ Movie Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($screenings as $screening): ?>
                <tr>
                    <td><?= $screening['screeningTime'] ?></td>
                    <td><?= htmlspecialchars($screening['theaterRoom']) ?></td>
                    <td><?= number_format($screening['ticketPrice'], 2) ?> €</td>
                    <td><?= $screening['subtitled'] ? '✅ Yes' : '❌ No' ?></td>
                    <td><?= htmlspecialchars($screening['movieTitle']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<br>
<a href="../index.php" class="btn">🔙 Back to Menu</a>
</body>
</html>
