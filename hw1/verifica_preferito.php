<?php
require_once 'auth.php';

// Verifica l'autenticazione
$userid = checkAuth();
if (!$userid) {
    echo json_encode(array("error" => "Utente non autenticato"));
    exit;
}

// Connessione al database
require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

// Verifica se è stato inviato l'ID del prodotto
if (isset($_POST["IdProdotto"])) {
    $IDProdotto = mysqli_real_escape_string($conn, $_POST["IdProdotto"]);

    // Query per verificare se il prodotto è presente nella wishlist
    $query = "SELECT * FROM wishlist WHERE user_id = $userid AND prodotto_id = $IDProdotto";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo json_encode(array("error" => "Errore nella query: " . mysqli_error($conn)));
        exit;
    }

    // Verifica se il prodotto è presente nella wishlist
    $presente = (mysqli_num_rows($result) > 0);

    // Restituisci il risultato come JSON
    echo json_encode(array("presente" => $presente));

    // Chiudi la connessione
    mysqli_close($conn);
} else {
    // ID del prodotto non specificato
    echo json_encode(array("error" => "ID del prodotto non specificato"));
}
?>
