<?php
require_once __DIR__ . '/../model/ScreeningModel.php';

class ScreeningController {
    public function index() {
        $screenings = ScreeningModel::getUpcomingScreenings();
        include __DIR__ . '/../view/ScreeningView.php';
    }
}
?>
