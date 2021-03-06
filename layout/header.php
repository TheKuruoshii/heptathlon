<?php 
$liste_categorie = getAllCategorie();
?>

<html>
    <head>
        <title>Heptathlon</title>
        <meta name="robots" content="noindex">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>

        <main class="container">

            <nav>
                <div class="logo">
                    <a href="index.php">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-header fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </div>
                <ul>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-home"></i> 
                            Accueil
                        </a>
                    </li>
                    <?php foreach($liste_categorie as $categories) : ?>
                    <li><a href="categorie.php?id=<?php echo $categories["id"]?>"><?php echo $categories["libelle"] ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="liste_sports.php">Sports</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>