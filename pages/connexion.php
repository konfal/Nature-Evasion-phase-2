<?php
session_start();

// Si l'utilisateur est connecté, on ne l'autorise pas à venir ici
if (isset($_SESSION['utilisateur'])) {
    header('Location: profil.php');
    exit();
}

// Message d'erreur si besoin
$erreur = '';
if (isset($_GET['erreur'])) {
    $erreur = htmlspecialchars($_GET['erreur']);
}

include('../includes/header.php');
?>

<main>
    <section class="login">
        <div class="form-container">
            <h1>Connexion</h1>
            <?php if (!empty($erreur)) : ?>
                <p style="color: red; text-align: center;"><?php echo $erreur; ?></p>
            <?php endif; ?>
            <form action="../php/connexion_traitement.php" method="post" class="filters-form">
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" placeholder="Votre e-mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" class="submit-button">Se connecter</button>
            </form>
        </div>

        <div class="image-container">
            <img src="https://static.vecteezy.com/ti/vecteur-libre/t2/11976274-chiffres-de-baton-bienvenue-vectoriel.jpg" alt="Image de bienvenue">
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
