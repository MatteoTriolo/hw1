<?php


// Inizializza array di eventi
$eventi = array();

// Verifica se il parametro 'categoria' è stato inviato tramite POST
if (isset($_POST['categoria'])) {
    // Connessione al database
    $conn = mysqli_connect("localhost", "root", "", "my_app_db");
    
    // Verifica della connessione
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }
    
    // Sanitizza il parametro 'categoria'
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    
    // Log per verificare il parametro ricevuto
    error_log("Categoria ricevuta: " . $categoria);
    
    // Esegui la query per filtrare per categoria
    $query = "SELECT * FROM prodotti WHERE categoria = '$categoria' ORDER BY categoria";
    $res = mysqli_query($conn, $query);
    
    // Verifica se la query ha avuto successo
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $eventi[] = $row;
        }
        // Libera il risultato
        mysqli_free_result($res);
    } else {
        error_log("Errore nella query: " . mysqli_error($conn));
    }
    
    // Chiudi la connessione al database
    mysqli_close($conn);
} else {
    error_log("Parametro 'categoria' non impostato.");
}

// Ritorna i dati in formato JSON
echo json_encode($eventi);

?>
