<?php
require_once '../config/config.php';
$movies = apiGet('/movies');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>🎬 Movie List</h1>

<?php if (empty($movies)): ?>
    <p class="error">⚠️ No movies found or failed to load data from API.</p>
<?php else: ?>
    <div class="table-container">
        <table class="movie-table">
            <thead>
            <tr>
                <th>🎞️ Title</th>
                <th>🎭 Genre</th>
                <th>⏱️ Duration</th>
                <th>📅 Release Date</th>
                <th>🎬 Currently Showing</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= htmlspecialchars($movie['title']) ?></td>
                    <td><?= htmlspecialchars($movie['genre']) ?></td>
                    <td><?= $movie['durationMinutes'] ?> min</td>
                    <td><?= $movie['releaseDate'] ?></td>
                    <td><?= $movie['currentlyShowing'] ? '✅ Yes' : '❌ No' ?></td>
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
