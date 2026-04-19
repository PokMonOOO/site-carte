<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.html');
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la BDD : " . $e->getMessage());
}

$user_id = $_SESSION['user_id']; 
$message = "";

if (isset($_POST['update_username'])) {
    $new_username = trim($_POST['username']);
    if (!empty($new_username)) {
        $stmt = $pdo->prepare("UPDATE users SET username = :username WHERE id = :id");
        $stmt->execute(['username' => $new_username, 'id' => $user_id]);
        
        $_SESSION['username'] = $new_username;
        $message = "Pseudo mis à jour !";
    }
}

if (isset($_POST['update_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch();

    if ($user && password_verify($old_password, $user['password'])) {
        $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        $stmt->execute(['password' => $hashedPassword, 'id' => $user_id]);
        $message = "Mot de passe modifié avec succès !";
    } else {
        $message = "L'ancien mot de passe est incorrect.";
    }
}

$stmt = $pdo->prepare("SELECT username FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$currentUser = $stmt->fetch();
$username_display = $currentUser ? $currentUser['username'] : "Utilisateur";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="favcon.png" sizes="32x32" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="base.css" />
    <title>Profil - <?php echo htmlspecialchars($username_display); ?></title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="favcon.png" alt="logo" style="width: 70px; height: 70px" />
        </div>
        <div class="lead">
            <a href="index.html#home"><div class="home center"><p>Home</p></div></a>
            <a href="index.html#discover"><div class="discover center"><p>Découvrir</p></div></a>
            <a href="index.html#video"><div class="video center"><p>Vidéo</p></div></a>
            <a href="index.html#contact"><div class="contact center"><p>Contact</p></div></a>
            
            <div class="lead-end">
    <span class="connexion" style="cursor: default; pointer-events: none;">
        Bienvenue <?php echo htmlspecialchars($username_display); ?>
    </span>
    <a href="src/logout.php" class="Inscription">Déconnexion</a>
</div>
        </div>
    </header>

    <main class="inscription-page">
        <section style="margin-top: 15rem; margin-top:">
            <div class="home_card_desc">
                <h1 style="text-align: center;">Paramètres du compte</h1>
                <?php if ($message): ?>
                    <p style="text-align: center; color: var(--headerColor); font-weight: bold;"><?php echo $message; ?></p>
                <?php endif; ?>
            </div>

            <form method="POST" action="" class="inscription-form" style="height: auto; margin-bottom: 20px;">
                <h2>Modifier le username</h2>
                <label for="username">Nouveau username :</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username_display); ?>" required>
                <button type="submit" name="update_username" class="home" style="border: none; padding: 10px 20px; margin-top: 10px; cursor: pointer;">Modifier</button>
            </form>

            <div class="jolie2" style="width: 80%; height: 2px; margin: 20px 0;"></div>

            <form method="POST" action="" class="inscription-form" style="height: auto;">
                <h2>Modifier le mot de passe</h2>
                <label for="old_password">Ancien mot de passe :</label>
                <input type="password" name="old_password" id="old_password" required>

                <label for="new_password">Nouveau mot de passe :</label>
                <input type="password" name="new_password" id="new_password" required>

                <button type="submit" name="update_password" class="home" style="border: none; padding: 10px 20px; margin-top: 10px; cursor: pointer;">Modifier</button>
            </form>

            <div style="margin-top: 30px;">
                <a href="confirmdel.php" class="connexion" style="color: #ff4444; font-size: 18px; text-decoration: none;">Supprimer mon compte</a>
            </div>
        </section>
    </main>

    <footer class="center" style="position: fixed; bottom: 0; display: flex; justify-content: center; align-items: center;">
        ©Nouveau fichier
    </footer>

    <script src="script.js"></script>
</body>
</html>