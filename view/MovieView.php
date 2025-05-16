<?php /** @var array $movies */ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Currently Showing</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Currently Showing Movies</h1>

<?php if (!empty($movies)): ?>
    <?php foreach ($movies as $movie): ?>
        <div class="movie">
            <h2><?= $movie['title'] ?></h2>
            <p><strong>Genre:</strong> <?= $movie['genre'] ?></p>
            <p><strong>Duration:</strong> <?= $movie['durationMinutes'] ?> minutes</p>
            <p><strong>Release Date:</strong> <?= $movie['releaseDate'] ?></p>
            <p><strong>In Theaters:</strong> <?= $movie['currentlyShowing'] ? 'Yes' : 'No' ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p><em>No movies available or failed to connect to the API.</em></p>
<?php endif; ?>

</body>
</html>
