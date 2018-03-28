<?php
require_once 'model/database.php';

$id = $_GET["id"];

$liste_produits = getProduitBySport($id);
$liste_sports = getAllSports();

require_once 'layout/header.php';
?>

<h1>Liste des sports</h1>

<main class="container">

    <nav>

        <ul>
            <?php foreach ($liste_sports as $sports) : ?>
                <li><a href="sports.php?id=<?php echo $sports["id"] ?>"><?php echo $sports["libelle"] ?></a></li>
            <?php endforeach; ?>
        </ul>

    </nav>

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
</main>

<?php require_once 'layout/footer.php' ?>
