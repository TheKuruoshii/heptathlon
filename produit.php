<?php
require_once 'model/database.php';
$id = $_GET['id'];
$produit = getProduit($id);
$liste_magasins = getMagasinByProduit($id);

require_once 'layout/header.php';
?>

<h1><?php echo $produit['nom'] ?></h1>

<img src="images/<?php echo $produit['image'] ?>" class="thumbnail">

<p><?php echo $produit['description'] ?></p>

<p>Sport : <?php echo $produit['sport']; ?></p>

<?php if ($produit['categorie'] != "") : ?>
    <p>Catégorie : <?php echo $produit['categorie']; ?></p>
<?php endif; ?>

    <p>Magasins : <br>
    <?php foreach ($liste_magasins as $magasin) : ?>
        <?php echo $magasin["nom"] ?>
    <br>
    <?php endforeach; ?>
</p>



<?php require_once 'layout/footer.php'; ?>