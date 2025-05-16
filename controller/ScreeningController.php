<?php
require_once(dirname(__DIR__) . "/config/config.php");

class ScreeningController {

    public function index() {
        $screenings = [];

        // Construir la URL base
        $url = API_URL . "/screenings";
        $params = [];

        // Añadir filtros si existen en la query string
        if (!empty($_GET['room'])) {
            $params[] = "room=" . urlencode($_GET['room']);
        }
        if (isset($_GET['subtitled']) && $_GET['subtitled'] !== '') {
            $params[] = "subtitled=" . $_GET['subtitled'];
        }
        if (!empty($_GET['date'])) {
            $params[] = "date=" . $_GET['date'];
        }
        if (count($params) > 0) {
            $url .= "?" . implode("&", $params);
        }

        // Petición cURL a la API
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        $response = curl_exec($ch);
        if (!curl_errno($ch) && $response !== false) {
            $screenings = json_decode($response, true);
        }
        curl_close($ch);

        // Cargar la vista con $screenings y filtros actuales
        include(dirname(__DIR__) . "/view/ScreeningView.php");
    }
}
