<?php
include 'auth.php';
if (checkAuth()) {
    header('Location: home.php');
    exit;
}

if (!empty($_POST["email"]) && !empty($_POST["password"])) {

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
    $query = "SELECT * FROM users WHERE email = '".$email."'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        $entry = mysqli_fetch_assoc($res);
        if (password_verify($_POST['password'], $entry['password'])) {

            // Imposto una sessione dell'utente
            $_SESSION["_agora_user_email"] = $entry['email'];
            $_SESSION["_agora_user_id"] = $entry['id'];
            header("Location: index.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    $error = "Email e/o password errati.";
} else if (isset($_POST["email"]) || isset($_POST["password"])) {
    $error = "Inserisci email e password.";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-css.css">
    <title>Accedi</title>
</head>
<body>
    <header id="header-login">
        <!-- Header content -->
    </header>

    <div id="nascondi-acc">
        <div id="pagina-form">
            <form id="form-login" action="login.php" method="post">
                <h2>Accedi</h2>
                <?php if (!empty($error)): ?>
                    <div class="error">
                        <p><?php echo $error; ?></p>
                    </div>
                <?php endif; ?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <input type="submit" class="login-submit" value="Accedi">
            </form>
            <p>Non hai un account? <a href="register.php" id="show-register">Registrati</a></p>
        </div>
    </div>
</body>
</html>
