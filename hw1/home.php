<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>


<head?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>

  <?php 
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
  ?>

  <head>

  <meta charset="utf-8">
        <title>home</title>
        <link rel="stylesheet" href="mhw3-css.css">
        <link rel="stylesheet" href="hom-css.css">
        <script src="hom-js.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
 </head>

 <v>
  <div?php 
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
$userinfo = mysqli_fetch_assoc($res_1);   
?>

<div class="container">
    <div id="user-info" class="section">
        <h2>Informazioni Utente</h2>
        <img src="img/icons8-utente-100.PNG" alt="utente">
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userinfo['email']); ?></p>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>

        <div id="canzoni_playlist">
           <h3>LE TUE CANZONI PREFERITE PER LE SESSIONI DA GAMING: </h3>
           <?php
    // Query per selezionare le canzoni salvate dall'utente
    $query_songs = "SELECT s.id, JSON_UNQUOTE(JSON_EXTRACT(s.content, '$.title')) AS title, JSON_UNQUOTE(JSON_EXTRACT(s.content, '$.artist')) AS artist FROM songs s WHERE s.user_id = $userid";
    $res_songs = mysqli_query($conn, $query_songs);

    if (mysqli_num_rows($res_songs) > 0) {
        while ($song_item = mysqli_fetch_assoc($res_songs)) {
            echo "<div class='song-item'>";
            echo "<p> titolo: " . htmlspecialchars($song_item['title']) . "</p>";
            echo "<p>Artista: " . htmlspecialchars($song_item['artist']) . "</p>";
          
            echo "</div>";

           
        }
    } else {
        echo "<p>La tua lista canzoni è vuota.</p>";
    }
?>


           
        </div>

    </div>





    <div id="wish-list" class="section">
        <h2>Wish List</h2>
        <?php
        // Query per selezionare i prodotti nella lista dei desideri dell'utente
        $query_wishlist = "SELECT p.titolo,p.url_immagine,p.prezzo,w.prodotto_id FROM wishlist w JOIN prodotti p ON w.prodotto_id  = p.id WHERE w.user_id = $userid";
        $res_wishlist = mysqli_query($conn, $query_wishlist);

        if (mysqli_num_rows($res_wishlist) > 0) {
            while ($wishlist_item = mysqli_fetch_assoc($res_wishlist)) {
                echo "<div class='cart-item'>";
                echo "<img src='" . htmlspecialchars($wishlist_item['url_immagine']) . "'  />";
                echo "<p>" . htmlspecialchars($wishlist_item['titolo']) . "</p>";
                echo "<p>Prezzo: €" . htmlspecialchars($wishlist_item['prezzo']) . "</p>";
                echo "<span class='remove_elementWish' data-product-id='" . htmlspecialchars($wishlist_item['prodotto_id']) . "'>RIMUOVI</span>";
                echo "</div>";
            }
        } else {
            echo "<p>La tua wish list è vuota.</p>";
        }
        ?>
    </div>

    <div id="cart" class="section">
        <h2>Carrello</h2>
        <?php
        // Query per selezionare i prodotti nel carrello dell'utente
        $query_cart = "SELECT p.titolo, p.prezzo, p.url_immagine, c.quantita, c.prodotto_id 
        FROM carrello c 
        JOIN prodotti p ON c.prodotto_id = p.id 
        WHERE c.user_id = $userid";
        $res_cart = mysqli_query($conn, $query_cart);
        $prezzo_totale = 0; 
        if (mysqli_num_rows($res_cart) > 0) {
            while ($cart_item = mysqli_fetch_assoc($res_cart)) {
                echo "<div class='cart-item'>";
                    echo "<img src='" . htmlspecialchars($cart_item['url_immagine']) . "'  />";
                    echo "<p>" . htmlspecialchars($cart_item['titolo']) . "</p>";
                    echo "<p>Prezzo: €" . htmlspecialchars($cart_item['prezzo']) . "</p>";
                    echo "<p>Quantità: " . htmlspecialchars($cart_item['quantita']) . "</p>";
                    echo "<div class='quantity-controls'>";
                    echo "<span class='decrease_element' data-product-id='" . htmlspecialchars($cart_item['prodotto_id']) . "'>-</span>";
                    echo "<span class='increase_element' data-product-id='" . htmlspecialchars($cart_item['prodotto_id']) . "'>+</span>";
                    echo "</div>";
                    echo "<span class='remove_element' data-product-id='" . htmlspecialchars($cart_item['prodotto_id']) . "'>RIMUOVI</span>";
                echo "</div>";

                $prezzo_totale += $cart_item['prezzo'] * $cart_item['quantita']; // Calcola il totale
            }
        } else {
            echo "<p>Il tuo carrello è vuoto.</p>";
        }
        ?>
        </div>
        <p class="total-price">Prezzo totale: €<?php echo htmlspecialchars($prezzo_totale); ?></p>

        <div class="tonaIndex"> 

         <a href="index.php" id="home-link">TORNA ALLA PAGINA INIZIALE</a>

        </div>
    </div>
    </div>
 
    </div>
  

  </body>
  </html>