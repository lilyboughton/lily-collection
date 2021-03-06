<?php

require_once 'functions.php';

$db = getDB();
$legoSets = retrieveLegoSets($db);
$displayLego = legoCollection($legoSets);

?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>HP Lego</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize.css" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>

    <header>
        <img src="images/legoLogo3.png" alt="Harry Potter Lego Collection" />
    </header>

    <section>
        <?php echo $displayLego;?>
    </section>

    <footer>
        <a href="addToCollection.php">Add to the collection -></a>
    </footer>

</body>
</html>