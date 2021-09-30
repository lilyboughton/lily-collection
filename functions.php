<?php

/**
 * Connects to the database 'lily-collection'
 * @return PDO
 */
function getDB() : PDO {
    $db = new PDO('mysql:host=db; dbname=lily-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Retrieves info from database
 * @param PDO $db 'lily-collection'
 * @return array data from 'lego-sets' table
 */
function retrieveLegoSets(PDO $db) : array {
    $query = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets` WHERE `deleted`=0");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Outputs concatenated string of HTML to display fields from database
 * @param array $legoSets array generated from database
 * @return string string of html
 */
function legoCollection (array $legoSets) : string {

    if(count($legoSets) === 0){
        return 'I can\'t find any lego sets at the moment, please try again later.';
    }

    $displayLego = '';
    foreach ($legoSets as $set) {

        if ($set['retired'] == 0) {
            $buyLink = "<a href='" . $set['buy-URL'] . "' target='_new'>Buy " . $set['item-name'] . '</a>';
        } else {
            $buyLink = "<a class='retired'>Retired Product</a>";
        }

        $starRating = '';
        for($i=1; $i<6; $i++){
            $starRating .= ' &#9733';
            if($set['star-rating'] == $i){break;}
        }

        $displayLego .= "<div class='legoItem'><div class='imageSpace'><img src='images/" . $set['image-URL'] . "' alt='" . $set['item-name'] . "'/></div>" .
            "<div><p>Name: <span class='info'>" . $set['item-name'] . '</span></p>' .
            "<p>Number of pieces: <span class='info'>" . $set['number-of-pieces'] . '</span></p>' .
            "<p>Age Category: <span class='info'>" . $set['age-category'] . '</span></p>' .
            "<p>Rating: <span class='starInfo'>$starRating</span></p></div>" .
            "<div class='buyLink'>$buyLink</div></div>";
    }

    return $displayLego;
}

/**
 * Takes data retrieved from `post` and converts special characters
 * @param array $postArray $_POST
 * @return array cleansed array
 */
function cleanseData(array $postArray) : array {
    $cleansedArray = [];
    foreach ($postArray as $key => $postArrayItem) {
        $cleansedArray[$key] =  htmlspecialchars($postArrayItem);
    }
    return $cleansedArray;
}

/**
 * Checks if the item already exists in the database based on name
 * @param array $itemArray cleansed array
 * @param PDO $db database 'lily-collection'
 * @return array empty array returned if item not found
 */
function checkItemExists(array $itemArray, PDO $db) : array {
    $name = $itemArray['item-name'];

    $findItem = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets` WHERE `item-name`= :itemName AND `deleted`=0");
    $findItem->bindParam(':itemName',$name);
    $findItem->execute();
    $item=$findItem->fetch();

    if($item == []) {
        return [];
    }
    return $item;
}

/**
 * Inserts data into database if it doesn't already exist
 * @param array $itemArray cleansed array
 * @param PDO $db database 'lily-collection'
 */
function insertToDatabase (array $itemArray, PDO $db) {

    $name = $itemArray['item-name'];
    $pieces = $itemArray['number-of-pieces'];
    $age = $itemArray['age-category'];
    $rating = $itemArray['star-rating'];
    if($itemArray['buy-url']===''){
        $buy = 'https://www.lego.com/en-gb/themes/harry-potter';
    } else {
        $buy = $itemArray['buy-url'];
    }
    $retired = $itemArray['retired'];

    $addItem = $db->prepare("INSERT INTO `lego-sets` (`item-name`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired`) VALUES (:itemName, :pieces, :age, :rating, :buy, :retired);");
    $addItem->execute(['itemName'=>$name, 'pieces'=>$pieces, 'age'=>$age, 'rating'=>$rating, 'buy'=>$buy, 'retired'=>$retired]);
}
