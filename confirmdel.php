<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.html');
    exit;
}

$username_display = $_SESSION['username'] ?? "Utilisateur";
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="favcon.png" sizes="32x32" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="base.css" />
    <title>Confirmer la suppression</title>
  </head>

  <body>
    <header>
      <div class="logo">
        <img src="favcon.png" alt="logo" style="width: 70px; height: 70px" />
      </div>
      <div class="lead">
        <a href="index.html#home"
          ><div class="home center"><p>Home</p></div></a
        >
        <a href="index.html#discover"
          ><div class="discover center"><p>Découvrir</p></div></a
        >
        <a href="index.html#video"
          ><div class="video center"><p>Vidéo</p></div></a
        >
        <a href="index.html#contact"
          ><div class="contact center"><p>Contact</p></div></a
        >

        <div class="lead-end">
          <span class="connexion" style="cursor: default; pointer-events: none">
            Bienvenue <?php echo htmlspecialchars($username_display); ?>
          </span>
          <a href="logout.php" class="Inscription">Déconnexion</a>
        </div>
      </div>
    </header>

    <main class="inscription-page">
      <section style="text-align: center; padding: 50px; margin-top: 15rem;">
        <div class="home_card_desc">
          <h1 style="color: #ff4444">Attention !</h1>
          <h2 style="margin-top: 20px">
            Êtes-vous sûr de vouloir supprimer définitivement votre compte,
            <strong><?php echo htmlspecialchars($username_display); ?></strong>
            ?
          </h2>
          <p style="margin-top: 10px; color: var(--black)">
            Cette action est irréversible.
          </p>
        </div>

        <div
          style="
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
          "
        >
          <a
            href="src/del.php"
            class="home"
            style="
              background-color: #ff4444;
              color: white;
              text-decoration: none;
              padding: 15px 40px;
              border-radius: 15px;
              font-weight: bold;
              width: fit-content;
            "
          >
            OUI, SUPPRIMER MON COMPTE
          </a>

          <a
            href="profil.php"
            class="connexion"
            style="font-size: 20px; text-decoration: none"
          >
            Annuler et retourner au profil
          </a>
        </div>
      </section>
    </main>

    <footer
      class="center"
      style="
        position: fixed;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
      "
    >
      ©Nouveau fichier
    </footer>
  </body>
</html>
