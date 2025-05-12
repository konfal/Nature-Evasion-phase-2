<?php 
include('../includes/header.php'); 

// Vérifie si l'utilisateur est connecté et s'il est admin
if (!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['role'] !== 'admin') {
    header('Location: connexion.php');
    exit;
}

// Charger les utilisateurs depuis le fichier JSON
$utilisateurs = json_decode(file_get_contents('../data/utilisateurs.json'), true);
?>

<main>
    <section class="admin">
        <h1>Page Administrateur</h1>

        <div class="user-list">
            <?php foreach ($utilisateurs as $user): ?>
                <div class="user">
                    <p><strong>Nom:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Statut:</strong> <?php echo htmlspecialchars($user['role']); ?></p>

                    <?php if ($user['role'] === 'client'): ?>
                        <button class="vip-button">Rendre VIP</button>
                    <?php elseif ($user['role'] === 'vip'): ?>
                        <button class="vip-button">Retirer VIP</button>
                    <?php endif; ?>

                    <?php if (isset($user['banned']) && $user['banned']): ?>
                        <button class="ban-button">Débannir</button>
                    <?php else: ?>
                        <button class="ban-button">Bannir</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
