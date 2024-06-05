<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>COPIA SITO RAZER </title>
        <link rel="stylesheet" href="mhw3-css.css">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="articoli_search-js.js" defer></script>
       
    
    </head>
    <body>

    <header>
      <!-- Aggiungi il nome utente qui -->
      <?php
    // Includi il file di autenticazione per verificare se l'utente è loggato
    require_once 'auth.php';

    // Controlla se l'utente è autenticato
    if (checkAuth()) {
        // Recupera il nome utente dalla sessione
        
        $username = $_SESSION['_agora_user_email'];
        echo'<h3 style="color:white"> benvenuto</h3>';

        // Visualizza il nome utente sulla homepage
       
    }
    ?>



         <a href="#"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN6afQTUwKnQTTc6Nsj80sCnnYJf_xcsQ8U6tFQ2vYcA&s" alt=""> </a>

       


          

          


    <a  href="pagina_ricerca_articoli.php"> <img id="u" src="img/cerca.PNG" alt=""> </a>

   
        </header>




   
    <div  id="cerca">
        <input type="text" id="categoryInput" placeholder="Inserisci categoria">
        
     </div>


     
    <div id="banner">
         <p> </p>
    </div>
  


    <div  class="stampa_prodotti"></div>