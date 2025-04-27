<?php
// Traitement simple du paiement

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroCarte = $_POST['numero_carte'];
    $nomCarte = $_POST['nom_carte'];
    $expiration = $_POST['expiration'];
    $cvv = $_POST['cvv'];

    // Vérification ultra simple (juste format)
    if (strlen($numeroCarte) === 16 && strlen($cvv) === 3 && !empty($nomCarte) && !empty($expiration)) {
        // Paiement accepté
        header('Location: paiement_valide.php');
        exit();
    } else {
        // Paiement refusé
        header('Location: paiement_erreur.php');
        exit();
    }
} else {
    // Redirection au cas où on accède directement
    header('Location: paiement.php');
    exit();
}
