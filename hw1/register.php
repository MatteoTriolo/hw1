<?php
require_once 'auth.php';

// Check if the user is already authenticated
if (checkAuth()) {
    header("Location: home.php");
    exit;
}

$error = array();

if (!empty($_POST["register-email"]) && !empty($_POST["register-password"]) && !empty($_POST["confirm-password"])) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Validate email
    $email = filter_var(strtolower($_POST['register-email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }

    // Validate password
    $password = $_POST["register-password"];
    $confirm_password = $_POST["confirm-password"];
    
    if (strlen($password) < 8) {
        $error[] = "Caratteri password insufficienti";
    }

    if ($password !== $confirm_password) {
        $error[] = "Le password non coincidono";
    }

    // Insert into database if no errors
    if (empty($error)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(email, password) VALUES('$email', '$hashed_password')";

        if (mysqli_query($conn, $query)) {
            session_start();
            $_SESSION["_agora_user_email"] = $email;
            $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: index.php");
            exit;
        } else {
            $error[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn);
} else if (isset($_POST["register-email"])) {
    $error[] = "Riempi tutti i campi";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati - Login Razer</title>
    <link rel="stylesheet" href="login-css.css">
    <script src="login-js.js" defer></script>
</head>
<body>
   <header id="header-login">
   </header>

   <div id="register-container">
        <form id="form-register" action="register.php" method="post">
            <h2>Registrati</h2>
            <?php if (!empty($error)): ?>
                <div class="error">
                    <?php foreach ($error as $err): ?>
                        <p><?php echo htmlspecialchars($err); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="input-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="register-email" required>
            </div>

            <div class="input-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" name="register-password" required>
            </div>

            <div class="input-group">
                <label for="confirm-password">Conferma Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            
            <input type="submit" class="register-submit" value="Registrati">
        </form>
        <p>Hai già un account? <a href="login.php" id="show-login">Accedi</a></p>
    </div>

   <footer id="footer-login">
   </footer>
</body>
</html>
