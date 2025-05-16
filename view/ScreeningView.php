<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Screenings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>List of Screenings</h1>

<!-- FORMULARIO DE FILTROS -->
<h2>Filter Screenings</h2>
<form method="get" action="index.php">
    <input type="hidden" name="page" value="screenings">

    <label for="room">Theater Room:</label>
    <input type="text" name="room" id="room"
           value="<?= isset($_GET['room']) ? htmlspecialchars($_GET['room']) : '' ?>">

    <label for="subtitled">Subtitled:</label>
    <select name="subtitled" id="subtitled">
        <option value="">-- All --</option>
        <option value="true" <?= (isset($_GET['subtitled']) && $_GET['subtitled']==='true') ? 'selected' : '' ?>>Yes</option>
        <option value="false" <?= (isset($_GET['subtitled']) && $_GET['subtitled']==='false') ? 'selected' : '' ?>>No</option>
    </select>

    <label for="date">From Date:</label>
    <input type="date" name="date" id="date"
           value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '' ?>">

    <input type="submit" value="Apply Filters">
    <a href="index.php?page=screenings" style="margin-left:1em;">Clear Filters</a>
</form>
<hr>

<?php if (empty($screenings)): ?>
    <p><em>No screenings available or API not connected.</em></p>
<?php else: ?>
    <?php foreach ($screenings as $screening): ?>
        <div class="screening-card">
            <p><strong>Date & Time:</strong> <?= htmlspecialchars($screening['screeningTime']) ?></p>
            <p><strong>Room:</strong> <?= htmlspecialchars($screening['theaterRoom']) ?></p>
            <p><strong>Price:</strong> €<?= number_format($screening['ticketPrice'], 2) ?></p>
            <p><strong>Subtitled:</strong> <?= $screening['subtitled'] ? 'Yes' : 'No' ?></p>
            <p><strong>Movie ID:</strong>
                <?= isset($screening['movieId']) ? htmlspecialchars($screening['movieId']) : 'N/A' ?>
            </p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
