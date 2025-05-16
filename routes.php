<?php

if (isset($_GET['page'])) {
    switch ($_GET['page']) {

        case 'movies':
            // Aquí iría el listado de películas si lo tuvieras
            require_once 'view/MovieRegisterView.php';
            break;

        case 'screenings':
            require_once 'controller/ScreeningController.php';
            $controller = new ScreeningController();
            $controller->index();
            break;

        case 'add-movie':
            require_once 'view/MovieRegisterView.php';
            break;

        case 'add-screening':
            require_once 'view/ScreeningRegisterView.php';
            break;

        default:
            echo "<h2>Page not found</h2>";
    }
} else {
    // Página por defecto
    header("Location: index.php?page=movies");
    exit();
}
