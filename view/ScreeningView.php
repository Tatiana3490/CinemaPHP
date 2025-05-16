<?php /** @var array $screenings */ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Screenings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Upcoming Screenings</h1>

<?php if (!empty($screenings)): ?>
    <?php foreach ($screenings as $screening): ?>
        <div class="screening">
            <p><strong>Movie:</strong> <?= $screening['film']['title'] ?></p>
            <p><strong>Screening Time:</strong> <?= $screening['screeningTime'] ?></p>
            <p><strong>Theater Room:</strong> <?= $screening['theaterRoom'] ?></p>
            <p><strong>Ticket Price:</strong> <?= $screening['ticketPrice'] ?> €</p>
            <p><strong>Subtitled:</strong> <?= $screening['subtitled'] ? 'Yes' : 'No' ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p><em>No upcoming screenings found or failed to connect to the API.</em></p>
<?php endif; ?>

</body>
</html>
