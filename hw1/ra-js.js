

function cercaNellaCategoria(event) {

    const category = document.getElementById('categoryInput').value;
    if(!category==="")
    fetch('path/to/your/ajax/file', {
        method: 'POST', // o 'GET' a seconda del metodo richiesto dal server
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ categoria: category })
    })
    .then(response => response.json())
    .then(data => {
        // Gestisci i dati della risposta
        console.log(data);
        alert("Risultati della ricerca: " + JSON.stringify(data));
    })
    .catch(error => {
        console.error('Errore nella fetch:', error);
        alert("Si è verificato un errore durante la ricerca.");
    });
}





const cerca=document.querySelector('#categoryInput');
cerca.addEventListener('click',cercaNellaCategoria);