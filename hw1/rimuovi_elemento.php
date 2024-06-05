<?php
require_once 'auth.php'; 

// Imposta l'intestazione per il tipo di contenuto come JSON
header('Content-Type: application/json');

if (!$userid = checkAuth()) {
    echo json_encode(["error" => "Utente non autenticato"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'dbconfig.php';
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(json_encode(["error" => mysqli_error($conn)]));

    // Verifica se è stato inviato un ID prodotto
    if (isset($_POST['productId'])) {
        $productId = mysqli_real_escape_string($conn, $_POST['productId']);

        // Esegui la query per rimuovere l'elemento dal carrello
        $query = "DELETE FROM carrello WHERE user_id = $userid AND prodotto_id = $productId";

        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => "Elemento rimosso dal carrello"]);
        } else {
            echo json_encode(["error" => "Errore durante la rimozione dell'elemento dal carrello"]);
        }

        // Chiudi la connessione al database
        mysqli_close($conn);
    } else {
        echo json_encode(["error" => "ID prodotto non specificato"]);
    }
} else {
    // Se la richiesta non è una richiesta POST, restituisci un errore
    echo json_encode(["error" => "Richiesta non consentita"]);
}
?>
