<?php
include('../includes/header.php');

// Charger la liste des voyages
$voyagesFile = '../data/voyages.json';
$voyages = [];

if (file_exists($voyagesFile)) {
    $voyages = json_decode(file_get_contents($voyagesFile), true);
}
?>

<main>
    <section class="search-section">
        <div class="form-container">
            <h1>Nos Voyages</h1>
            <p>Découvrez toutes nos destinations disponibles :</p>

            <?php foreach ($voyages as $voyage) : ?>
    <div style="background: rgba(240, 248, 255, 0.85); max-width: 700px; margin: 30px auto; padding: 25px; border-radius: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50;"><?php echo htmlspecialchars($voyage['destination']); ?></h2>
        <p style="margin-bottom: 10px;"><?php echo htmlspecialchars($voyage['description']); ?></p>
        <p><strong>Option :</strong> <?php echo htmlspecialchars($voyage['option']); ?></p>
        <img src="<?php echo htmlspecialchars($voyage['image']); ?>" alt="Image de <?php echo htmlspecialchars($voyage['destination']); ?>" style="width: 100%; height: auto; margin: 15px 0; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <form action="reservation.php" method="get" style="margin-top: 15px;">
            <input type="hidden" name="destination" value="<?php echo htmlspecialchars($voyage['destination']); ?>">
            <button type="submit" class="submit-button">Réserver</button>
        </form>
    </div>
<?php endforeach; ?>



        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
