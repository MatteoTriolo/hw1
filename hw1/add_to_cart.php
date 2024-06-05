<?php
require_once 'auth.php';

// Verifica l'autenticazione
if (!$userid = checkAuth()) {
    echo json_encode(array("error" => "Utente non autenticato"));
    header('Location: login.php');
    exit;
}

// Connessione al database
require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

if (isset($_POST["IdProdotto"])) {
    // Aggiungi Prodotto
    $userid = mysqli_real_escape_string($conn, $userid);
    $IDProdotto = mysqli_real_escape_string($conn, $_POST["IdProdotto"]);

    // Verifica se il prodotto è già nel carrello per l'utente
    $query = "SELECT quantita FROM carrello WHERE user_id = $userid AND prodotto_id = $IDProdotto";
    $result = mysqli_query($conn, $query);

    $query = "SELECT quantita FROM carrello WHERE user_id = $userid AND prodotto_id = $IDProdotto";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // Il prodotto è già nel carrello, aggiorna la quantità
        $row = mysqli_fetch_assoc($result);
        $quantita = $row["quantita"] + 1;
        $query = "UPDATE carrello SET quantita = $quantita WHERE user_id = $userid AND prodotto_id = $IDProdotto";
    } else {
        // Il prodotto non è nel carrello, inseriscilo
        $query = "INSERT INTO carrello (user_id, prodotto_id, quantita) VALUES ($userid, $IDProdotto, 1)";
    }
    if (mysqli_query($conn, $query)) {
        echo json_encode(array("success" => "Prodotto aggiunto al carrello con successo"));
    } else {
        echo json_encode(array("error" => "Errore durante l'aggiunta del prodotto al carrello: " . mysqli_error($conn)));
    }

    // Chiudi connessione
    mysqli_close($conn);
} else {
    echo json_encode(array("error" => "Nessun prodotto specificato"));
}
?>
