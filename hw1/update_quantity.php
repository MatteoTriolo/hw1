<?php
require_once 'auth.php';

// Verifica l'autenticazione
if (!$userid = checkAuth()) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => "Utente non autenticato"));
    exit;
}

require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if (!$conn) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => "Connessione al database fallita"));
    exit;
}

$userid = mysqli_real_escape_string($conn, $userid);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $action = mysqli_real_escape_string($conn, $_POST['action']);

    if ($action == 'increase') {
        $query = "UPDATE carrello SET quantita = quantita + 1 WHERE user_id = $userid AND prodotto_id = $product_id";
    } elseif ($action == 'decrease') {
        $query = "UPDATE carrello SET quantita = CASE WHEN quantita > 1 THEN quantita - 1 ELSE 1 END WHERE user_id = $userid AND prodotto_id = $product_id";
    }

    // Esegui la query
    if (mysqli_query($conn, $query)) {
        header('Content-Type: application/json');
        echo json_encode(array("success" => true));
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Errore durante l'aggiornamento della quantità: " . mysqli_error($conn)));
        exit;
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array("error" => "Metodo di richiesta non valido"));
    exit;
}
?>
