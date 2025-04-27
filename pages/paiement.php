<?php include('../includes/header.php'); ?>

<main>
    <section class="search-section">
        <div class="form-container" style="text-align: center;">
            <h1>Paiement</h1>
            <p>Merci de saisir vos coordonnées bancaires pour finaliser votre réservation.</p>
            <form action="traitement_paiement.php" method="post" class="filters-form" style="margin-top: 30px;">
                <div class="form-group">
                    <label for="numero_carte">Numéro de carte bancaire :</label>
                    <input type="text" id="numero_carte" name="numero_carte" maxlength="16" required>
                </div>
                <div class="form-group">
                    <label for="nom_carte">Nom sur la carte :</label>
                    <input type="text" id="nom_carte" name="nom_carte" required>
                </div>
                <div class="form-group">
                    <label for="expiration">Date d'expiration (MM/AA) :</label>
                    <input type="text" id="expiration" name="expiration" placeholder="MM/AA" required>
                </div>
                <div class="form-group">
                    <label for="cvv">Code de sécurité (CVV) :</label>
                    <input type="text" id="cvv" name="cvv" maxlength="3" required>
                </div>
                <button type="submit" class="submit-button">Valider le paiement</button>
            </form>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
