<?php
session_start();

// Pour déboguer temporairement une boucle de redirection
// session_destroy();

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
                    // Authentification réussie : on garde seulement les infos nécessaires
                    $_SESSION['utilisateur'] = [
                        'email' => $utilisateur['email'],
                        'name' => $utilisateur['name'] ?? 'Non renseigné',
                        'role' => $utilisateur['role'] ?? 'client'
                    ];
                    
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
    // Accès direct interdit
    header('Location: ../pages/connexion.php');
    exit();
}
