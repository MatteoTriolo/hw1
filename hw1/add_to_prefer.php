<?php
require_once 'auth.php';

// Verifica l'autenticazione
if (!$userid = checkAuth()) {
    echo json_encode(array("error" => "Utente non autenticato"));
    exit;
}

// Connessione al database
require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

if (isset($_POST["IdProdotto"])) {
    // Aggiungi Prodotto
    $userid = mysqli_real_escape_string($conn, $userid);
    $IDProdotto = mysqli_real_escape_string($conn, $_POST["IdProdotto"]);
    
    // Verifica se il prodotto è già nella wishlist
    $queryCheck = "SELECT * FROM wishlist WHERE user_id = $userid AND prodotto_id = $IDProdotto";
    $resultCheck = mysqli_query($conn, $queryCheck);
    
    if (mysqli_num_rows($resultCheck) > 0) {
        echo json_encode(array("error" => "Prodotto già presente nella wishlist"));
    } else {
        // Inserisci il prodotto nella wishlist
        $queryInsert = "INSERT INTO wishlist (user_id, prodotto_id) VALUES ($userid, $IDProdotto)";
        if (mysqli_query($conn, $queryInsert)) {
            echo json_encode(array("success" => "Prodotto aggiunto alla wishlist"));
        } else {
            echo json_encode(array("error" => "Errore durante l'aggiunta del prodotto alla wishlist: " . mysqli_error($conn)));
        }
    }

    // Chiudi connessione
    mysqli_close($conn);
} else {
    echo json_encode(array("error" => "Nessun prodotto specificato"));
}
?>