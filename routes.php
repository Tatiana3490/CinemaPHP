<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'movies':
            require_once 'controller/MovieController.php';
            $controller = new MovieController();
            $controller->index();
            break;
        case 'screenings':
            require_once 'controller/ScreeningController.php';
            $controller = new ScreeningController();
            $controller->index();
            break;
        default:
            echo "<h2>Page not found</h2>";
    }
} else {
    header("Location: index.php?page=movies");
    exit();
}
?>
