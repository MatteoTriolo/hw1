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

// Query per ottenere i prodotti nel carrello dell'utente
$query = "
    SELECT prodotti.id, prodotti.titolo, prodotti.descrizione, prodotti.prezzo, prodotti.url_immagine, carrello.quantita 
    FROM carrello 
    JOIN prodotti ON carrello.prodotto_id = prodotti.id 
    WHERE carrello.user_id = $userid";
$result = mysqli_query($conn, $query);

$cart_items = array();
while ($row = mysqli_fetch_assoc($result)) {
    $cart_items[] = $row;
}

// Restituisci il JSON con i prodotti nel carrello
echo json_encode($cart_items);

// Chiudi connessione
mysqli_close($conn);
?>
