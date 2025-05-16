<?php
require_once __DIR__ . '/../config/config.php';

class MovieModel {
    public static function getCurrentlyShowing() {
        $json = @file_get_contents(API_URL . '/films?currentlyShowing=true');
        if ($json === false) {
            return [];
        }
        return json_decode($json, true);
    }
}
?>
