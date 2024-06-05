<?php
require_once 'auth.php'; 
// Gestisci la richiesta POST
if (!$userid = checkAuth()) {
    echo "Utente non autenticato";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'dbconfig.php';
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    // Verifica se è stato inviato un ID prodotto
    if (isset($_POST['productId'])) {
        $productId = mysqli_real_escape_string($conn, $_POST['productId']);

        // Esegui la query per rimuovere l'elemento dal carrello
        $query = "DELETE FROM wishlist WHERE user_id = $userid AND prodotto_id = $productId";

        if (mysqli_query($conn, $query)) {
            echo "successo";
        } else {
            echo "Errore durante la rimozione dall'elemento del carrello.";
        }

        // Chiudi la connessione al database
        mysqli_close($conn);
    } else {
        echo "ID prodotto non specificato";
    }
} else {
    // Se la richiesta non è una richiesta POST, restituisci un errore
    echo "Richiesta non consentita";
}
?>
