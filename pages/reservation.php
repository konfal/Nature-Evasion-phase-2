<?php 
include('../includes/header.php'); 
session_start();

// Récupérer la destination passée en URL
$destination = isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : 'Destination inconnue';

// Chemin du fichier de réservations
$reservationsFile = '../data/reservations.json';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $voyage = htmlspecialchars($_POST['voyage']);
    
    // Charger les réservations existantes
    if (file_exists($reservationsFile)) {
        $reservations = json_decode(file_get_contents($reservationsFile), true);
    } else {
        $reservations = [];
    }

    // Ajouter la nouvelle réservation
    $nouvelleReservation = [
        'nom' => $nom,
        'email' => $email,
        'voyage' => $voyage,
        'date' => date('Y-m-d H:i:s')
    ];

    $reservations[] = $nouvelleReservation;

    // Sauvegarder dans le fichier JSON
    file_put_contents($reservationsFile, json_encode($reservations, JSON_PRETTY_PRINT));

    // Stocker la réservation en session (optionnel, utile pour le futur)
    $_SESSION['derniere_reservation'] = $nouvelleReservation;

    // Rediriger vers la page de confirmation avec bouton de paiement
    header('Location: confirmation.php');
    exit();
}
?>

<main>
    <section class="search-section">
        <div class="form-container">
            <h1>Réservation</h1>
            <p>Vous êtes sur le point de réserver un séjour à :</p>
            <h2><?php echo $destination; ?></h2>

            <form action="" method="post" class="filters-form">
                <div class="form-group">
                    <label for="nom">Votre nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="email">Votre e-mail :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="voyage">Destination choisie :</label>
                    <input type="text" id="voyage" name="voyage" value="<?php echo $destination; ?>" readonly>
                </div>
                <button type="submit" class="submit-button">Confirmer la réservation</button>
            </form>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
