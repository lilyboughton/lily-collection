<?php

$db = new PDO('mysql:host=db; dbname=lily-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets`");
$query->execute();

$legoSets = $query->fetchAll();

$displayLego = '';
foreach($legoSets as $set){

    if($set['retired'] == 0){
        $buyLink = "<a href='".$set['buy-URL']."'>Buy ". $set['item-name'] . '</a>';
    } else {
        $buyLink = "<a class='retired'>Retired Product</a>";
    }

    if($set['star-rating'] === '5') {
        $starRating = '	&#9733	&#9733	&#9733	&#9733	&#9733';
    } elseif ($set['star-rating'] === '4') {
        $starRating = '	&#9733	&#9733	&#9733	&#9733';
    } elseif ($set['star-rating'] === '3') {
        $starRating = '	&#9733	&#9733	&#9733';
    } elseif ($set['star-rating'] === '2') {
        $starRating = '	&#9733	&#9733';
    } elseif ($set['star-rating'] === '1') {
        $starRating = '	&#9733';
    }

    $displayLego .=  "<div class='legoItem'><div class='imageSpace'><img src='images/". $set['image-URL']. "' alt='". $set['item-name'] ."'/></div>".
        "<div><p>Name: <span class='info'>" . $set['item-name'] . '</span></p>' .
        "<p>Number of pieces: <span class='info'>". $set['number-of-pieces'] . '</span></p>' .
        "<p>Age Category: <span class='info'>". $set['age-category'] . '</span></p>' .
        "<p> Star Rating: <span class='starInfo'>$starRating</span></p></div>" .
        "<div class='buyLink'>$buyLink</div></div>";
}
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