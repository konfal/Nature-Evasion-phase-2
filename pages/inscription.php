<?php include('../includes/header.php'); ?>

<main>
    <section class="registration">
        <div class="form-container">
            <h1>Inscription</h1>
            <form action="../php/inscription_traitement.php" method="post">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" placeholder="ex: Idir Bakiri" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="ex: moubtakiramine@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmez le mot de passe:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                </div>
                <button type="submit" class="submit-button">S'inscrire</button>
            </form>
        </div>

        <div class="image-containerrr">
            <img src="https://img.freepik.com/free-vector/realistic-travel-horizontal-banner-suitcases-beach-umbrellas-other-attributes-tourism-gathered-together-vector-illustration_1284-81822.jpg" alt="Image d'inscription">
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
