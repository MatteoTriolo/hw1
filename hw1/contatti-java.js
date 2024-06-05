


//API AB ABSTRACT VERIFICA EMAIL INSERITA NEL CHECK BOX



function onResponse(response) {
    console.log('Risposta ricevuta');
    
   
    return response.json();
  }
 
  function onJson(onJson) {
    
    if(onJson.is_disposable_email.value) {
       alert('L\'indirizzo email é temporaneo.');
        
        // Puoi fare qualche altra azione qui, se necessario
    }
    else if(onJson.is_valid_format.value) {
       alert('L\'indirizzo email é  valido.');
       // Puoi fare qualche altra azione qui, se necessario
   }
 }
 
 
 // const chiave primaria abstract
 function search(event)
 {
 
    console.log('fetch')
    const apiKey = '2c70cc2f43f844638c6c4a809f172c1e';
    const apiUrl = 'https://emailvalidation.abstractapi.com/v1/?';
    
 
   // Impedisci il submit del form
   event.preventDefault();
   // Leggi valore del campo di testo
   const email=document.querySelector('#email');
   const email_value=encodeURIComponent(email.value);
   console.log('Eseguo ricerca: ' + email_value );
   // Esegui la richiesta
   fetch(apiUrl+'api_key='+apiKey+'&email='+email_value).then(onResponse).then(onJson);
   email.value="";
 }
 //fine search




















// varibile che aggiunge al form il listener per la funzione di validazione delle email
const form = document.querySelector('#emailForm');
form.addEventListener('submit', search);