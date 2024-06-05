








// rimuove elementi dal carrello 
function rimuoviDalCarrello(event) {
    event.preventDefault();

    const productId = this.getAttribute('data-product-id');

    fetch('rimuovi_elemento.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'productId=' + productId
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            console.error('Errore durante la rimozione dal carrello:', data.error || data);
        }
    })
    .catch(error => {
        console.error('Si è verificato un errore:', error);
    });
}



// fetch per controllare gli elementi dal carrello;


function rimuoviDallaWishList(event){


 event.preventDefault();

    const productId = this.getAttribute('data-product-id');

    fetch('rimuovi_elemento_wish.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'productId=' + productId
    })
    .then(response => response.text())
.then(data => {
    if (data === "successo") {
        window.location.reload();
    } else {
        console.error('Errore durante la rimozione dal carrello:', data);
    }
})
.catch(error => {
    console.error('Si è verificato un errore:', error);
});

}

//fetch per aumentare





function aumentaQuantita(event) {
    const productId = this.getAttribute('data-product-id');
    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('action', 'increase');

    fetch('update_quantity.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Errore durante la richiesta AJAX');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log('Quantità aumentata con successo');
            window.location.reload();
            // Aggiorna l'interfaccia utente se necessario
        } else {
            console.error('Errore durante l\'aumento della quantità:', data.error);
            // Gestisci l'errore
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta AJAX:', error);
        // Gestisci gli errori di rete o altri errori
    });
}

function diminuisciQuantita(event) {
    const productId = this.getAttribute('data-product-id');
    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('action', 'decrease');

    fetch('update_quantity.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Errore durante la richiesta AJAX');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log('Quantità diminuita con successo');
            window.location.reload();
            // Aggiorna l'interfaccia utente se necessario
        } else {
            console.error('Errore durante la diminuzione della quantità:', data.error);
            // Gestisci l'errore
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta AJAX:', error);
        // Gestisci gli errori di rete o altri errori
    });
}







//fetch per diminuire 


const aumentaB =document.querySelectorAll('.increase_element');
aumentaB .forEach(button => {
    button.addEventListener('click', aumentaQuantita);
});


const diminuisciB =document.querySelectorAll('.decrease_element');
diminuisciB .forEach(button => {
    button.addEventListener('click', diminuisciQuantita);
});


const removeButtonsPrefer =document.querySelectorAll('.remove_elementWish');
removeButtonsPrefer .forEach(button => {
    button.addEventListener('click', rimuoviDallaWishList);
});

const removeButtons =document.querySelectorAll('.remove_element');
removeButtons .forEach(button => {
    button.addEventListener('click', rimuoviDalCarrello);
});



