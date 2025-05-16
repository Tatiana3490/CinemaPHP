<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Screening</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Add a New Screening</h1>

<!-- Mensajes de éxito o error -->
<?php if (isset($_SESSION['mensaje_screening'])): ?>
    <p style="color:green;"><strong><?= $_SESSION['mensaje_screening'] ?></strong></p>
    <?php unset($_SESSION['mensaje_screening']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_screening'])): ?>
    <p style="color:red;"><strong><?= $_SESSION['error_screening'] ?></strong></p>
    <?php unset($_SESSION['error_screening']); ?>
<?php endif; ?>

<form method="post" action="controller/ScreeningRegisterController.php">
    <label for="screeningTime">Screening Time:</label><br>
    <input type="datetime-local" name="screeningTime" id="screeningTime" required><br><br>

    <label for="theaterRoom">Theater Room:</label><br>
    <input type="text" name="theaterRoom" id="theaterRoom" required><br><br>

    <label for="ticketPrice">Ticket Price (€):</label><br>
    <input type="number" name="ticketPrice" id="ticketPrice" step="0.01" required><br><br>

    <label for="subtitled">Subtitled:</label><br>
    <select name="subtitled" id="subtitled">
        <option value="true">Yes</option>
        <option value="false">No</option>
    </select><br><br>

    <label for="movieId">Movie ID:</label><br>
    <input type="number" name="movieId" id="movieId" required><br><br>

    <input type="submit" value="Save Screening">
</form>

</body>
</html>
