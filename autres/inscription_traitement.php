<?php
session_start();

// Vérifier si les données sont envoyées
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier que les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Lire les utilisateurs existants
    $file = '../data/utilisateurs.json';
    $utilisateurs = json_decode(file_get_contents($file), true);

    // Vérifier si l'email existe déjà
    foreach ($utilisateurs as $user) {
        if ($user['email'] === $email) {
            echo "Cet email est déjà utilisé.";
            exit;
        }
    }

    // Ajouter le nouvel utilisateur
    $nouvel_utilisateur = [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role' => 'client', // par défaut, l'utilisateur est client
        'banned' => false
    ];

    $utilisateurs[] = $nouvel_utilisateur;

    // Sauvegarder dans le fichier JSON
    file_put_contents($file, json_encode($utilisateurs, JSON_PRETTY_PRINT));

    // Rediriger vers la page de connexion
    header('Location: ../pages/connexion.php');
    exit;
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
