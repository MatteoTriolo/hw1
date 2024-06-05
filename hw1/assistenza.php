<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>COPIA SITO RAZER </title>
        <link rel="stylesheet" href="mhw3-css.css">
        <link rel="stylesheet" href="as-css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="as-js.js" defer></script>
       
    
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

       


          

            <div>
                <a href="">Contatti</a>
            </div>
          
            <div>
                <a href="login.php"><img src="img/login.png" alt=""></a>
            </div>
           
            <div>
                <a href="assistenza.html">Assistenza</a>
            </div>


    <a  href="pagina_ricerca_articoli.php"> <img id="u" src="img/cerca.PNG" alt=""> </a>

   
        </header>

   


     <div  id="menuAscomparsa" class="nascondi-tendina">
        
    <div id="modal-view-menu" class="hidden" >
      <img id="chiudi"src="img/x.PNG" alt="">
   

    <div >
        <a href="#">Contatti</a>
    </div>
    <div >
        <a href="#">PC</a>
    </div>
    <div >
        <a href="#">Comunità</a>
    </div>
    <div>
        <a href="#">Servizi</a>
    </div>
    <div c>
        <a href="#">Assistenza</a>
    </div>

    </div>
   </div>



    <div class="hidden" id="barra">
    <div  id="cerca">
         <img id="ab" src="img/x.PNG" alt="">
     </div>
    </div>
    <div id="banner">
         <p> </p>
    </div>
  
     <div class="testoassistenza">
    <h2>Assistenza Razer</h2>
    <p>Benvenuto nella pagina di assistenza Razer. Qui puoi trovare le risposte alle tue domande e ottenere supporto per i prodotti Razer.</p>
    </div>
    <div id="assistenza">
    
    
    <!-- Sezione FAQ -->
    <div id="faq-chat-container">
        <!-- Sezione FAQ -->
        <div id="faq">
            <h3>FAQ - Domande Frequenti</h3>
            <div class="faq-item" data-question="Come posso registrare il mio prodotto Razer?"><a href="#">Come posso registrare il mio prodotto Razer?</a></div>
            <div class="faq-item" data-question="Come posso richiedere una riparazione?"><a href="#">Come posso richiedere una riparazione?</a></div>
            <div class="faq-item" data-question="Dove posso trovare i driver per il mio dispositivo Razer?"><a href="#">Dove posso trovare i driver per il mio dispositivo Razer?</a></div>
        </div>
        </div>

    <!-- Sezione ChatGPT -->
    <div id="chatgpt">
        <h3>Assistenza ChatGPT</h3>
        <p>Hai bisogno di ulteriori aiuti? Chiedi al nostro assistente virtuale, alimentato da ChatGPT!</p>
        <!-- Spazio per l'API di ChatGPT -->
        <div id="chat-container">
       
        <div class="conversation"></div>
        <input type="text" id="input_utente" placeholder="Scrivi qui..." />   
        </div>
    </div>
</div>

<!-- Inizio footer -->
<footer>
    <div>
        <a href>Privacy</a>
        <a href>Termini e Condizioni</a>
        <a href="contatti.php">Contatti</a>
    </div>
    <p>&copy; 2024 Razer Inc. Tutti i diritti riservati.</p>
</footer>

    
