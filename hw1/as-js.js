// Codice JavaScript (script.js)

// Funzione per inviare la richiesta al bot
function gestioneBot() {
    const endpointPhp = "chatgpt.php"; // Specifica il percorso al tuo script PHP
    const dialogo = document.querySelector('.conversation');
    const finestra_input = document.getElementById("input_utente");
    const testo = finestra_input.value;
    
    // Creazione dell'elemento span per il messaggio dell'utente
    const span_user = document.createElement("span");
    span_user.textContent = testo;
    span_user.classList.add("user-message");
    dialogo.appendChild(span_user);
    
    // Formattazione della richiesta da inviare al file PHP
    const formatRichiesta = {
        messages: [{ role: "user", content: testo }],
        model: "gpt-3.5-turbo",
    };
    
    // Invio della richiesta al file PHP tramite fetch
    fetch(endpointPhp, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formatRichiesta)
    })
    .then(onResponse)
    .then(TextExtractor)
    .catch(onError);
    
    // Reset dell'input dell'utente
    finestra_input.value = "";
}


function onResponse(response) {
    console.log('Risposta ricevuta');
     
    return response.json(); 
}

// Funzione per gestire la risposta del bot
function TextExtractor(json) {
    console.log(json);
    const risp22 = json.choices[0].message.content;
    const dialogo = document.querySelector('.conversation');
    
    // Creazione dell'elemento span per la risposta del bot
    const span_bot = document.createElement("span");
    span_bot.textContent = risp22;
    span_bot.classList.add("bot-message");
    dialogo.appendChild(span_bot);
}

// Funzione per gestire gli errori nella richiesta all'API
function onError(error) {
    console.error('Errore durante la richiesta API');
}

// Trova l'elemento del pulsante "Invia"
const sendButton = document.createElement("button");
sendButton.textContent = "Invia";

// Aggiungi l'evento click al pulsante "Invia"
sendButton.addEventListener("click", gestioneBot);

// Trova l'elemento padre del pulsante "Invia" e aggiungilo
const parentElement = document.querySelector('.conversation');
parentElement.appendChild(sendButton);