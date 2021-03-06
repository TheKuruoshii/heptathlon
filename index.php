<?php
require_once 'model/database.php';
$liste_produits = getAllProduits(3);


require_once 'layout/header.php';
?>

<h1>Bienvenue sur le site internet d'Heptathlon</h1>

<section>
    <?php foreach ($liste_produits as $produit) : ?>
        <article>
            <h2><?php echo $produit['nom']; ?></h2>
            <img src="images/<?php echo $produit['image']; ?>">
            <p>
                Sport : <?php echo $produit['sport']; ?>
            </p>
            <?php if ($produit['categorie'] != "") : ?>
                <p>
                    Catégorie : <?php echo $produit['categorie']; ?>
                </p>
            <?php endif; ?>
            <a class="btn" href="produit.php?id=<?php echo $produit['id']; ?>">
                <i class="fa fa-eye"></i> 
                Afficher
            </a>
        </article>
    <?php endforeach; ?>
</section>

<?php require_once 'layout/footer.php'; ?>