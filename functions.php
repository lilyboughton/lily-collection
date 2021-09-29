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
    $query = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets`");
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


