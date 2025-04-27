<?php 
include('../includes/header.php'); 
session_start();
?>

<main>
    <section class="search-section">
        <div class="form-container" style="text-align: center;">
            <h1>Réservation Confirmée !</h1>
            <p>Merci d'avoir réservé avec Nature & Évasion 🌴✨.</p>

            <?php if (isset($_SESSION['derniere_reservation'])): ?>
                <p><strong>Destination :</strong> <?php echo htmlspecialchars($_SESSION['derniere_reservation']['voyage']); ?></p>
                <p><strong>Date de réservation :</strong> <?php echo htmlspecialchars($_SESSION['derniere_reservation']['date']); ?></p>
            <?php endif; ?>

            <a href="paiement.php" class="cta-button" style="margin-top: 30px;">Procéder au paiement</a>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
