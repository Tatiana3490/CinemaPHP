<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cinema Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="menu">
    <a href="view/list_movies.php" class="btn">📽️ View Movies</a>
    <a href="view/list_screenings.php" class="btn">🎟️ View Screenings</a>
    <a href="view/add_movie.php" class="btn">➕ Add Movie</a>
    <a href="view/add_screening.php" class="btn">➕ Add Screening</a>
    <a href="view/edit_movie.php" class="btn">✏️ Modify Movie</a>
    <a href="view/edit_screening.php" class="btn">✏️ Modify Screening</a>
    <a href="view/delete_movie.php" class="btn">❌ Delete Movie</a>
    <a href="view/delete_screening.php" class="btn">❌ Delete Screening</a>
</div>
</body>
<?php include 'footer.php'; ?>

</html>
