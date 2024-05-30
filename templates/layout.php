<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="img/logo.png" alt="Logo Artbox" id="logo"></a>             
            <nav>
                <?php require('nav.php'); ?>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <?php require('footer.php'); ?>
        </footer>
    </body>
</html>
