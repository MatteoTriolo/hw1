<?php

// Recupera i dati POST inviati dall'utente
$data = json_decode(file_get_contents("php://input"), true);

// Controlla se i dati sono stati inviati correttamente
if ($data) {
    // Imposta l'endpoint e la chiave di autenticazione
    $endpointApi = "https://api.openai.com/v1/chat/completions";
    $apiKey = "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"; // Sostituisci con la tua chiave API di OpenAI

    // Formatta la richiesta da inviare all'API di OpenAI
    $requestData = json_encode([
        'messages' => $data['messages'],
        'model' => $data['model']
    ]);

    // Configura e invia la richiesta all'API di OpenAI utilizzando cURL
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $endpointApi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $requestData,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ]
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Se c'è un errore, restituisci un messaggio di errore
    if ($err) {
        echo json_encode(['error' => 'Errore durante la richiesta API']);
    } else {
        // Altrimenti, restituisci la risposta dell'API di OpenAI
        echo $response;
    }
} else {
    // Se non ci sono dati inviati correttamente, restituisci un messaggio di errore
    echo json_encode(['error' => 'Dati non ricevuti correttamente']);
}
?>

