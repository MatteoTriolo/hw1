let costoTotale = 0;








//inizio funzioni per le merci
function menuOrizontaleCuffie() {
   const categoria = 'cuffie';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });
}







function onResponse(response) {
   if (!response.ok) {
       throw new Error("Network response was not ok " + response.statusText);
   }
   return response.json();
}


function onJson(json) {
    console.log(json);
    // Gestisci i dati ricevuti
    // Esempio: aggiorna la tua interfaccia utente con i prodotti ricevuti
    const risultati = json;
    risultati.forEach(element => {
        const contenitore = document.createElement('div');
        const imgElement = document.createElement('img');

        const spec = document.createElement('span');
        const testo = document.createElement('span');
        const costo = document.createElement('span');
        const preferito = document.createElement('span');

        imgElement.src = element.url_immagine;
        testo.textContent = element.titolo;
        spec.textContent = element.descrizione;
        costo.textContent = element.prezzo;
        
       vediSepreferito(preferito,element);

        spec.classList.add('descrizione');
        testo.classList.add('descrizione');
        costo.classList.add('prezzo');
        contenitore.classList.add('inlinea');
        preferito.classList.add('prezzo');

        contenitore.appendChild(imgElement);
        contenitore.appendChild(testo);
        contenitore.appendChild(spec);
        contenitore.appendChild(costo);
        contenitore.appendChild(preferito);

        modale.appendChild(contenitore);

        // Aggiungi un listener per il click sul prezzo
        costo.addEventListener('click', function() {
        Acquista(costo, element);
    });



    
    preferito.addEventListener('click', function() {
        inPreferiti(preferito, element);
    });
     

});
}


function vediSepreferito(preferito, element) {
    console.log('Verifico se il prodotto è presente nei preferiti');

    // Effettua la richiesta al PHP per verificare se il prodotto è presente nella wishlist
    fetch('verifica_preferito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'IdProdotto=' + encodeURIComponent(element.id)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok " + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        // Aggiorna il testo del pulsante in base al risultato
        if (data.presente) {
            preferito.textContent = 'Aggiunto ai preferiti';
        } else {
            preferito.textContent = 'Aggiungi ai preferiti';
        }
    })
    .catch(error => {
        console.error('Errore durante la verifica del prodotto nei preferiti:', error);
    });
}



function Acquista(cliccato, proprietario) {
  console.log('cioa');
  fetch('add_to_cart.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({ 'IdProdotto': proprietario.id }).toString()
  })
  .then(response)
  .then(data => {
      if (data.error === "Utente non autenticato") {
          window.location.replace('login.php');
      } else if (data.error) {
          alert(data.error);
      } else {
        

          cliccato.classList.add('testoPersonalizzato');
          cliccato.textContent = 'aggiunto al carrello- clicca per aggiungere nuovamente';
        

      }
  })
  .catch(error => {
      console.error('Errore:', error);
  });
}

function response(response) {
  if (!response.ok) {
      throw new Error("Network response was not ok " + response.statusText);
  }
  return response.json().then(data => {
      console.log(data);
      return data;
  });
}



//fetch per aggiungere ai preferiti 
function inPreferiti(cliccato, proprietario) {
    console.log('ciao');
    fetch('add_to_prefer.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ 'IdProdotto': proprietario.id }).toString()
    })
    .then(oresponse)
    .then(data => {
        if (data.error === "Utente non autenticato") {
            window.location.replace('login.php');
        } else if (data.error) {
            alert(data.error);
        } else {
            cliccato.classList.add('testoPersonalizzato');
            cliccato.textContent = 'aggiunto ai preferiti ';
            
        }
    })
    .catch(error => {
        console.error('Errore:', error);
    });
}

 function oresponse(response) {
    if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
    }
    return response.json().then(data => {
        console.log(data);
        return data;
    });
  }









// toglie articolo dal carrello e il rispettivo prezzo 
function togliDalCarrello(dove,cosa,prezzo)
{
   dove.removeChild(cosa);
   costoTotale=costoTotale-prezzo;
   inserire.innerHTML="";
   const totale=document.createElement('span');
   totale.classList.add('testoCarrello');
   totale.textContent=costoTotale.toLocaleString();
   const scrittaTotale=document.createElement('span');
   scrittaTotale.textContent="TOTALE:";
   inserire.appendChild(scrittaTotale);
   inserire.appendChild(totale);
}


// calcola costo totale degli articoli del carrello 
function calcolaCosto(costo)
{
   
   inserire.innerHTML="";
   costoTotale+=costo;
   
   console.log(costoTotale);
   const totale=document.createElement('span');
   totale.classList.add('testoCarrello');
   totale.textContent=costoTotale.toLocaleString();
   const scrittaTotale=document.createElement('span');
   scrittaTotale.textContent="TOTALE:";
   inserire.appendChild(scrittaTotale);
   inserire.appendChild(totale);
}


// Esempio di utilizzo

function menuOrizontaleSedie(){

   const categoria = 'sedie';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });


}



function menuOrizontaleMause(){


   const categoria = 'Mouse';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });
}

function menuOrizontaleLampade(){

   const categoria = 'lampade';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });
}


function menuOrizontaleTastiera(){


   const categoria = 'Tastiera';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });
}

function menuOrizontaleSet()
{


   const categoria = 'elementi da streaming';

   // Costruisci il corpo della richiesta con il parametro di categoria
   const data = new URLSearchParams();
   data.append('categoria', categoria);

   fetch('ajax_prodotti_db.php', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
       },
       body: data.toString()
   })
   .then(onResponse)
   .then(onJson)
   .catch(error => {
       console.error('Errore:', error);
   });
}
//funzione che divide specifiche in base al box selezionato

function aggiungiSpecifiche(user)
{
   console.log(user);
   const index = parseInt(user.dataset.index);
   if(index===1)
   {

     menuOrizontaleCuffie()
     
   }
   if(index===2)
   {
      menuOrizontaleSedie()
   }
   if(index===3)
   {
      menuOrizontaleMause()
   }
   if(index===4)
   {
      menuOrizontaleLampade()
   }
   if(index===5)
   {
      menuOrizontaleTastiera()
   }
   if(index===6)
   {
     menuOrizontaleSet()
   }

           
}


function specifiche(event)
{
       
      
   
   const chiudi=document.createElement('h1');
   chiudi.textContent="X";
   chiudi.classList.add('chiudi');
   chiudi.addEventListener('click',chiudiSpecifiche);
   modale.classList.remove('hidden');
   modale.appendChild(chiudi);    
   document.body.classList.add('no-scroll');
   aggiungiSpecifiche(event.currentTarget);



   

   
}


//chiude la modale
function chiudiSpecifiche(event){
   modale.classList.add('hidden');
   modale.innerHTML='';
   document.body.classList.remove('no-scroll');

}

//fine funzioni merci



//carrello
function visualizzaCarrello(event)
{

   
   carrello.addEventListener('click',nascondiCarrello);
   carrello.removeEventListener('click',visualizzaCarrello);
   
   const carrelloDaVisualizzare=document.querySelector('#shop');
   carrelloDaVisualizzare.classList.add('hidden');

   
    fetch('get_cart_items.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok " + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.error) {
            alert(data.error);
        } else {
            // Gestisci i dati ricevuti
            console.log(data);
            updateCartUI(data);
        }
    })
    .catch(error => {
        console.error('Errore:', error);
    });

    

}

function  updateCartUI(cartItems)
{
  
     const principale=document.querySelector('#aggiunto');
     principale.innerHTML="";

     
    
     cartItems.forEach(item => {
     
        const remove=document.createElement('h1');
       remove.textContent='X';

      const itemContainer = document.createElement('div');
      itemContainer.classList.add('articoloCarrello');
      
      const imgElement = document.createElement('img');
      imgElement.src = item.url_immagine;
      
      const titleElement = document.createElement('span');
      titleElement.textContent = item.titolo;
      
      const descElement = document.createElement('span');
      descElement.textContent = item.descrizione;
      
      const priceElement = document.createElement('span');
      priceElement.textContent = '€ ' + item.prezzo;

      const quantityElement = document.createElement('span');
      quantityElement.textContent = 'Quantità: ' + item.quantita;
      
      itemContainer.appendChild(remove);
      itemContainer.appendChild(imgElement);
      itemContainer.appendChild(titleElement);
      itemContainer.appendChild(priceElement);
     
      itemContainer.appendChild(quantityElement);
      principale.appendChild(itemContainer);


      remove.addEventListener('click', function() {
        rimuoviDalcarrello(item.id,itemContainer);
    });


    });
   
    

}



function rimuoviDalcarrello(id,contenitore) {
    console.log('ciao');
    const data = new URLSearchParams();
    data.append('productId', id); 

    fetch('rimuovi_elemento.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data.toString()
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error('Errore:', data.error);
        } else {
            console.log('Risposta JSON:', data);
            contenitore.remove();
            
        }
    })
    .catch(error => {
        console.error('Errore:', error);
    });
  

   
    

     
      



}









function nascondiCarrello(event)
{

  
   carrello.addEventListener('click',visualizzaCarrello);
   carrello.removeEventListener('click',nascondiCarrello);
   
   const carrelloDaVisualizzare=document.querySelector('#shop');
   carrelloDaVisualizzare.classList.remove('hidden');

}





function appariMenu(event)
{

     const cliccato=event.currentTarget;
     cliccato.addEventListener('click',chiudiMenu);
     cliccato.removeEventListener('click',appariMenu);
     

     const elemento=document.querySelector('#menuAscomparsa');
     elemento.classList.remove('nascondi-tendina');
     document.body.classList.add('no-scroll');
}

function chiudiMenu(event)
{

     const cliccato=event.currentTarget;
     cliccato.addEventListener('click',appariMenu);
     cliccato.removeEventListener('click',chiudiMenu);
     

     const elemento=document.querySelector('#menuAscomparsa');
     elemento.classList.add('nascondi-tendina');
     document.body.classList.remove('no-scroll');


}









//inizio funzione che mi ritorna spotify




function jsonSpotify(onJson)
{

   console.log(' nuovo JSON ricevuto');
   const contenitore_spotify=document.querySelector('#album-view');
   contenitore_spotify.innerHTML="";
   console.log(onJson);
   const results = onJson.playlists.items;
  let num_results = results.length;
  
  if(num_results > 4)
    num_results = 4;
  // Processa ciascun risultato
  for(let i=0; i<num_results; i++)
  {
    // Leggi il documento
    const album_data = results[i]
    // Leggiamo info
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    // Creiamo il div che conterrà immagine e didascalia
    const album = document.createElement('div');
    album.classList.add('album');
    // Creiamo l'immagine
    const img = document.createElement('img');
    img.src = selected_image;
    // Creiamo la didascalia
    const caption = document.createElement('span');
    caption.textContent = title;
    // Aggiungiamo immagine e didascalia al div
    album.appendChild(img);
    album.appendChild(caption);
    
    album.addEventListener('click', function(){

        visualizzaPlaylist(album_data)
    });


    // Aggiungiamo il div alla libreria
    contenitore_spotify.appendChild(album);
  }
  }


  function visualizzaPlaylist(album_data){
    fetch("elenco_canzoni_playlist.php?id=" + encodeURIComponent(album_data.id))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(displayPlaylistDetails)
                .catch(error => console.error('Error fetching playlist details:', error));

}
   

function displayPlaylistDetails(json){

    console.log(json);
     const esci_playlist=document.querySelector('#nascondi_playlist');
     const playlistDetails = document.querySelector('#playlist-details');
      
     const chiudi_playlist = document.createElement('h1');
     chiudi_playlist.classList.add('chiudiPlaylist');
     chiudi_playlist.addEventListener('click',chiudiplaylist);
     chiudi_playlist.textContent='X';



    esci_playlist.classList.remove('hidden');
    playlistDetails.innerHTML = "";
    const title = document.createElement('h2');
    title.textContent = json.name;
    const numTracks = document.createElement('p');
    numTracks.textContent = `Number of tracks: ${json.total}`;
   
    playlistDetails.appendChild(title);
    playlistDetails.appendChild(numTracks);
    
    
    const trackList = document.createElement('ul');
    playlistDetails.appendChild(chiudi_playlist);
    json.items.forEach(item => {
        const trackItem = document.createElement('li');
        trackItem.textContent = item.track.name;
        const saveButton = document.createElement('button');
        saveButton.textContent = 'Save to Favorites';
        saveButton.classList.add('save-button');
        saveButton.addEventListener('click', () => saveToFavorites(item.track));
        trackItem.appendChild(saveButton);
        trackList.appendChild(trackItem);
    });

    playlistDetails.appendChild(trackList);
}


function saveToFavorites(track) {
    console.log('salvo canzone');
    const formData = new FormData();
  formData.append('id', track.id);
  formData.append('title', track.name);
  formData.append('artist',  track.artists[0].name);
  
  fetch("save_favorite.php", {method: 'post', body: formData}).then(dispatchResponse, dispatchError);
}


function dispatchResponse(response) {

    console.log(response);
    return response.json().then(databaseResponse); 
  }
  
  function dispatchError(error) { 
    console.log("Errore");
  }
  

  function databaseResponse(json) {
    if (!json.ok) {
        dispatchError();
        return null;
    }
    alert('aggiunto alle canzoni preferite');
  }


function chiudiplaylist(event)
{

    const esci_playlist=document.querySelector('#nascondi_playlist');
    esci_playlist.classList.add('hidden');

      
}





/*
function onJsonspotify_podcast(onJson)
{

   console.log('JSON ricevuto');
   const contenitore_spotify=document.querySelector('#album-view');
   contenitore_spotify.innerHTML="";
   console.log(onJson);
   const results = onJson.shows;
  let num_results = results.length;
  // Mostriamone al massimo 10
 
  // Processa ciascun risultato
  for(let i=0; i<num_results; i++)
  {
    // Leggi il documento
    const album_data = results[i]
    // Leggiamo info
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    // Creiamo il div che conterrà immagine e didascalia
    const album = document.createElement('div');
    album.classList.add('album');
    // Creiamo l'immagine
    const img = document.createElement('img');
    img.src = selected_image;
    // Creiamo la didascalia
    const caption = document.createElement('span');
    caption.textContent = title;
    // Aggiungiamo immagine e didascalia al div
    album.appendChild(img);
    album.appendChild(caption);
    // Aggiungiamo il div alla libreria
    contenitore_spotify.appendChild(album);
    contenitore_spotify.classList.add('riduci');
  }





}

*/






//funzione di search


function searchSpotify(event){
    console.log('nuova fetch spotify');
    const form_data = new FormData(document.querySelector("#search_content"));
    const searchQuery = 'gaming';
    fetch("cerca_canzone.php?q="+encodeURIComponent(searchQuery)).then(searchResponse).then(jsonSpotify);
    event.preventDefault();
}


function searchResponse(response){
    console.log(response);
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}



// Aggiungi event listener al form di spotify
const formSpotify = document.querySelector('#search_content');
formSpotify.addEventListener('submit', searchSpotify);










//const per aprire il carrello 
const carrello=document.querySelector('.kart');
carrello.addEventListener('click',visualizzaCarrello);


 
 //menu a tendina 
 const menuTendina=document.querySelector('#tentina');
 menuTendina.addEventListener('click',appariMenu);

 //apertura carrello
 const inserire=document.querySelector('#apri-carrello');





//dichiaro costanti
//modale 
const modale=document.querySelector('#modal-view');

const box=document.querySelectorAll('.box img');

for(let i = 0; i < box.length; i++) {
   box[i].addEventListener('click',specifiche);
   
 }





   
     
   



   