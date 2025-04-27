<?php
session_start();

// Vérification que le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Charger les utilisateurs depuis le fichier JSON
    $utilisateursFile = '../data/utilisateurs.json';
    if (file_exists($utilisateursFile)) {
        $utilisateurs = json_decode(file_get_contents($utilisateursFile), true);

        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur['email'] === $email) {
                if (password_verify($password, $utilisateur['password'])) {
                    // Authentification réussie
                    $_SESSION['utilisateur'] = $utilisateur;
                    header('Location: ../pages/profil.php');
                    exit();
                } else {
                    // Mauvais mot de passe
                    header('Location: ../pages/connexion.php?erreur=Mot de passe incorrect.');
                    exit();
                }
            }
        }
        // Email pas trouvé
        header('Location: ../pages/connexion.php?erreur=E-mail non trouvé.');
        exit();
    } else {
        die('Erreur : fichier utilisateurs introuvable.');
    }
} else {
    // Si accès direct à ce script
    header('Location: ../pages/connexion.php');
    exit();
}
?>
