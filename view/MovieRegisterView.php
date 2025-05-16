<!DOCTYPE html>
<html>
<head>
    <title>Add New Movie</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Add a New Movie</h1>

<form method="post" action="index.php?page=add-movie">
    <label>Title:</label><br>
    <input type="text" name="title" required><br>

    <label>Genre:</label><br>
    <input type="text" name="genre" required><br>

    <label>Duration (minutes):</label><br>
    <input type="number" name="durationMinutes" required><br>

    <label>Release Date:</label><br>
    <input type="date" name="releaseDate" required><br>

    <label>Currently Showing:</label><br>
    <select name="currentlyShowing">
        <option value="true">Yes</option>
        <option value="false">No</option>
    </select><br><br>

    <input type="submit" value="Save Movie">
</form>

<?php if (isset($message)): ?>
    <p><strong><?= $message ?></strong></p>
<?php endif; ?>
</body>
</html>
