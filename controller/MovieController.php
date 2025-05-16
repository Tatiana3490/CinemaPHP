<?php
require_once __DIR__ . '/../model/MovieModel.php';

class MovieController {
    public function index() {
        $movies = MovieModel::getCurrentlyShowing();
        include __DIR__ . '/../view/MovieView.php';
    }
}
?>
