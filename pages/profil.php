<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

include('../includes/header.php');
?>

<main>
    <section class="profile">
        <div class="profile-header">
            <h1>Mon Profil</h1>
            <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg" alt="Photo de profil">
        </div>

        <div class="profile-info">
            <div class="info-item">
                <label>Nom :</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Non renseigné'); ?>" readonly>
            </div>
            <div class="info-item">
                <label>Email :</label>
                <input type="email" value="<?php echo htmlspecialchars($_SESSION['user']['email'] ?? 'Non renseigné'); ?>" readonly>
            </div>
            <div class="info-item">
                <label>Mot de passe :</label>
                <input type="password" value="********" readonly>
            </div>
            <div class="info-item">
                <label>Téléphone :</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['user']['telephone'] ?? 'Non renseigné'); ?>" readonly>
            </div>
            <div class="info-item">
                <label>Adresse :</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['user']['adresse'] ?? 'Non renseignée'); ?>" readonly>
            </div>
        </div>

        <h2 style="margin-top: 40px; text-align: center;">Mes Réservations</h2>

        <div style="margin-top: 20px;">
            <?php
            $reservationsFile = '../data/reservations.json';
            if (file_exists($reservationsFile)) {
                $reservations = json_decode(file_get_contents($reservationsFile), true);
                $userEmail = $_SESSION['user']['email'] ?? '';
                $found = false;

                echo '<ul style="list-style: none; padding: 0;">';
                foreach ($reservations as $reservation) {
                    if ($reservation['email'] === $userEmail) {
                        echo '<li style="margin-bottom: 10px; padding: 10px; background-color: #f4f4f4; border-radius: 5px;">';
                        echo '<strong>Destination :</strong> ' . htmlspecialchars($reservation['voyage']) . '<br>';
                        echo '<strong>Date de réservation :</strong> ' . htmlspecialchars($reservation['date']);
                        echo '</li>';
                        $found = true;
                    }
                }
                echo '</ul>';

                if (!$found) {
                    echo '<p style="text-align: center;">Vous n\'avez pas encore effectué de réservation.</p>';
                }
            } else {
                echo '<p style="text-align: center;">Pas de réservations enregistrées.</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
