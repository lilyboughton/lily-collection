<?php

require_once 'functions.php';

$db = new PDO('mysql:host=db; dbname=lily-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets`");
$query->execute();

$legoSets = $query->fetchAll();

$displayLego = legoCollection($legoSets);

?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>HP Lego</title>
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
        <a href="#">Add to the collection -></a>
    </footer>

</body>
</html>