<?php
require_once __DIR__ . '/../config/config.php';

class ScreeningModel {
    public static function getUpcomingScreenings() {
        $today = date("Y-m-d");
        $json = @file_get_contents(API_URL . "/projections/upcoming?from=" . $today);
        if ($json === false) {
            return [];
        }
        return json_decode($json, true);
    }
}
?>
