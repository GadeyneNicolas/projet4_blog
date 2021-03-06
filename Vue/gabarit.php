<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/Css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Nunito+Sans:400,700" rel="stylesheet">
    <title>Jean FORTEROCHE</title>
</head>

<body>
    <header>
        <div id="titre_header"><h1>Billet simple pour l'Alaska</h1></div>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=APropos">A Propos</a></li>
                <li><a href="index.php?action=MesLivres">Mes livres</a></li>
                <li><a href="index.php?action=Contact">Contact</a></li>
            </ol>
        </nav>
    </header>

    <div class="contenu">
        <?= $contenu ?>
    </div>

    <footer id="piedBlog">
        <p>Copyright © 2019 Jean FORTEROCHE - Billet simple pour l'Alaska - 
         <a href="index.php?action=Mentions">Mentions légales</a> - <a href="index.php?action=Confidentialite">Politique de confidentialité</a></p>
</footer>
</body>

</html>