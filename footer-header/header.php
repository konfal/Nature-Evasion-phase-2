<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature & Évasion</title>

    <!-- Lien vers le CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    
    <!-- Polices Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- Optionnel : FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Nature & Évasion</div>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="presentation.php">Présentation</a></li>
                <li><a href="recherche.php">Rechercher</a></li>

                <?php if (isset($_SESSION['utilisateur'])) : ?>
                    <li><a href="profil.php">Profil</a></li>

                    <?php if ($_SESSION['utilisateur']['role'] === 'admin') : ?>
                        <li><a href="admin.php">Administration</a></li>
                    <?php endif; ?>

                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php else : ?>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
