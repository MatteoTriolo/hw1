<!DOCTYPE html>
<html lang="it" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>COPIA SITO RAZER </title>
        <link rel="stylesheet" href="mhw3-css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <script src="magazzino-js.js" defer> </script>
    
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
                <a href="assistenza.php">Assistenza</a>
            </div>


    <a  href="pagina_ricerca_articoli.php"> <img id="u" src="img/cerca.PNG" alt=""> </a>

    <img class="kart" src="img/carrello.PNG" alt=""> 

        </header>

    <div id="menu">
      <a href="#"> <img id="tentina" src="https://www.razer.com/assets/images/mobile-menu.svg" alt=""> </a>
      <a href="#"> <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN6afQTUwKnQTTc6Nsj80sCnnYJf_xcsQ8U6tFQ2vYcA&s" alt=""> </a>
     <a  href="#"> <img id="due" class="kart" src="img/carrello.PNG" alt=""> </a>
    </div>



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
         <p> copia sito razer</p>
    </div>

    
    <div class="hidden"  id="shop" >
    

        <div class="carrello">

        <div id="aggiunto">
        
        </div>
        
        <div id="apri-carrello">
        <a href="login.php">vai al carrello</a>
        </div>

        </div>  
        
        
    
    </div>

     <div class="content">
        <a href="#"> <img id="cambia" src="https://assets2.razerzone.com/images/pnx.assets/9d0a8ebf8b1a2e39e745cdefefe9b83d/razer-black-desert-online-8th-anniversary-collab-homepage-desktop-2x.webp" alt=""></a>
            <div class="testo">
                 <a href="#"class="test"> <h1 id="a">GIOCA CON RAZER</h1> </a>
                      
                      
            </div>




     </div>

              <div class="content">
                  <a href="#"> <img src="https://assets2.razerzone.com/images/pnx.assets/8fdffeca7ecd2c3b26aa9e294bf89c83/hammerhead-multiplatform-homepage-desktop2x.webp" alt=""></a>
                     <div class="testo">
                              <a href="#"class="test"> <h1 id="a"> RAZER GUIDA GLI EASPORT GAMER </h1> </a>
                            
                              
                     </div>

                </div>

                    <div class="content" >
                        <a href="#"> <img src="https://assets2.razerzone.com/images/pnx.assets/8fdffeca7ecd2c3b26aa9e294bf89c83/razer-seiren-v3-homepage-desktop2x.webp" alt=""></a>
                          <div class="testo">
                                     <h1   class="test" id="a">SEGUI LE MIGLIORI PLAYLIST O PODCAST SUL GAMING </h1> 
                                    <p  class="test" id="a"> clicca sulla playlist e metti tra i preferiti i tuoi brani che ti aiutano nelle sessioni di gaming </p> 
                                   
                                    <form name ='search_content' id='search_content'>
			
                                        <p>premi il pulsante per visualizzare le playlist consigliate per il gaming </p>
                                        
                                        <label><input class="submit" type='submit'>Search for Gaming playlist</label>
                                                
                                    </form>

                                    <article id="album-view">
			
                                    </article>
                                    <div id="nascondi_playlist" class="hidden">
                                       
                                    <div id="playlist-details" class="hidden">
                                    
 

                                    </div>
                                    </div>
                                    
                                
                                  


                          </div>

                     </div>

                  
                     <section id="modal-view" class="hidden">

                    
                     </section>

                     
       <div >

       <div class="box">
                   <div class="uno" >
                   
                    <a href="#" class="disattivato"> <img data-index="1" src="https://assets2.razerzone.com/images/pnx.assets/7e0a561274e0eedca427c5826fe57c77/razer-blackshark-v2-hyperspeed-white-b-950x580-desktop.webp" alt=""> </a>
                    
                        <div class="testop" id="specuno">
                                  <a class="test"> <h1 id="a">la nostra linea headset</h1> </a>
                                  <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                  
                        </div>

                   </div>


                   <div class="due" >
                          <a href="#"> <img data-index="2" src="https://assets2.razerzone.com/images/pnx.assets/89acc66caa02feac3530c8d538b16d4f/razer-iskur-v2-homepage-b-950x580-desktop.webp" alt=""> </a>
                       <div class="testop">
                        <a class="test"> <h1 id="a">le nostre sedie da gaming</h1> </a>
                        <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                   
                       </div>

                   </div>

        </div>
       
       <div class="box" >
                        <div class="uno">
                               <a href="#"> <img data-index="3"  src="https://assets2.razerzone.com/images/pnx.assets/89acc66caa02feac3530c8d538b16d4f/razer-deathadder-v3-pro-dongle-bundle-b-950x580-desktop.webp" alt=""> </a>
                            <div class="testop" id="spCuffie">
                                <a class="test"> <h1 id="a">i nostri mouse</h1> </a>
                                <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                        
                            </div>

                       </div>

                          <div class="due">
                               <a href="#"> <img data-index="4" src="https://assets2.razerzone.com/images/pnx.assets/3104efb034e49d58b0915a5d07c2115a/razer-gamer-room-line-950x580-desktop.webp" alt=""> </a>
                              <div class="testop">
                                <a class="test"> <h1 id="a">le nostre lampade</h1> </a>
                                <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                          
                              </div>

                          </div>
         </div>

                      <div class="box">

                            <div class="uno" >
                                    <a href="#"> <img data-index="5" src="https://assets2.razerzone.com/images/pnx.assets/bbffede42365ea3ed65d0b13ab080c48/razer-huntsman-v3-pro-line-b-950x580-desktop.webp" alt=""> </a>
                                <div class="testop">
                                    <a class="test"><h1 id="a">le nostre tastiere</h1> </a>
                                    <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                            
                                </div>


                             </div>



                            <div class="due" >
                                  <a href="#"> <img  data-index="6" src="https://assets2.razerzone.com/images/pnx.assets/7e0a561274e0eedca427c5826fe57c77/razerstore-rewards-deathstalker-v2-pro-b-950x580-desktop.webp" alt=""> </a>
                                <div class="testop">
                                    <a class="test"> <h1 id="a">i nostri accessori per setup completo</h1> </a>
                                    <a class="test"> <p>clicca sull'imagine per visualizzare articoli</p> </a>
                                            

                                 </div>




                            </div>



                     </div>

                    </div>

 <footer>
    

      

 </footer>

    </body>
</html>
