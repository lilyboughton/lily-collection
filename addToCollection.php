<?php
require_once 'functions.php';

$db = getDB();
$cleansedArray = cleanseData($_POST);

if(!empty($cleansedArray)) {
    if (checkItemExists($cleansedArray, $db) != []) {
        echo '<p>This item already exists in the collection.</p>';
    } else {
        insertToDatabase($cleansedArray, $db);
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Add to the Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize.css" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>

<header>
    <img src="images/legoLogo3.png" alt="Harry Potter Lego Collection" />
</header>

<section>
    <form method="post" action="addToCollection.php">
        <div class="formItem">
            <label for="item-name">Lego Set Name</label>
            <input type="text" name="item-name" id="item-name" maxlength="255" pattern="[^()/><\][\\\x22,;|]+" required />
        </div>

        <div class="formItem">
            <label for="number-of-pieces">Number of Pieces</label>
            <input type="number" name="number-of-pieces" id="number-of-pieces" min="0" max="100000" required class="numberWidth" />
        </div>

        <div class="formItem">
            <label for="age-category">Age Category</label>
            <input type="text" name="age-category" id="age-category" maxlength="255" required />
        </div>

        <div class="formItem">
            <label for="star-rating">Rating</label>
            <div class="starRating">
                <div class="starRatingItem">
                    <p>1 <span class="colourStar">&#9733</span></p>
                    <input type="radio" name="star-rating" id="1" value="1" />
                </div>
                <div class="starRatingItem">
                    <p>2 <span class="colourStar">&#9733</span></p>
                    <input type="radio" name="star-rating" id="2" value="2" />
                </div>
                <div class="starRatingItem">
                    <p>3 <span class="colourStar">&#9733</span></p>
                    <input type="radio" name="star-rating" id="3" value="3" />
                </div>

                <div class="starRatingItem">
                    <p>4 <span class="colourStar">&#9733</span></p>
                    <input type="radio" name="star-rating" id="4" value="4" />
                </div>
                <div class="starRatingItem">
                    <p>5 <span class="colourStar">&#9733</span></p>
                    <input type="radio" name="star-rating" id="5" value="5" checked/>
                </div>
            </div>
        </div>

        <div class="formItem">
            <label for="buy-url">Where to Buy (URL)</label>
            <input type="url" name="buy-url" id="buy-url" maxlength="255" />
        </div>

        <div class="formItem retiredItem">
            <label for="retired">Is this set retired?</label>
            <div class="retiredWidth">
                <p>Yes</p>
                <input type="radio" name="retired" id="Yes" value="1" class="moveRight"/>

                <p>No</p>
                <input type="radio" name="retired" id="No" value="0" checked  />
            </div>
        </div>

        <div class="submitButton">
            <input type="submit" value="Submit" />
        </div>
    </form>
</section>

<footer>
    <a href="index.php">Go back to the collection -></a>
</footer>

</body>
</html>

