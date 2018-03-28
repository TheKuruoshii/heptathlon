<?php
require_once 'model/database.php';

require_once 'layout/header.php';

$liste_sports = getAllSports();
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
</main>