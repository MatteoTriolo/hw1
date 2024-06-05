<?php
require_once 'auth.php';

if (!checkAuth()) exit;

header('Content-Type: application/json');

spotify();

function spotify() {
    $client_id = '5c313f98e8ff49f8b3f9ac7b336dde42';
    $client_secret = 'dbfd820a35cc464fbcbce366b1f93cba'; 

    // ACCESS TOKEN
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
    $token=json_decode(curl_exec($ch), true);
    
    if (isset($token['error'])) {
        echo json_encode(['error' => 'Error retrieving access token']);
        exit;
    }

    curl_close($ch);    

    // QUERY EFFETTIVA
    $query = urlencode($_GET["q"]);
    $url = 'https://api.spotify.com/v1/search?type=playlist&q='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
    $res = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(['error' => 'Error fetching data from Spotify']);
        exit;
    }

    curl_close($ch);

    // Assicurati che la risposta sia JSON valida
    $decoded_res = json_decode($res, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON response from Spotify']);
        exit;
    }

    echo $res;
}
?>
