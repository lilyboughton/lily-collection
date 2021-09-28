<?php

function legoCollection (array $legoSets) : string {

    if($legoSets === []){
        $displayLego = 'There is an error with the database, please try again later.';
    } else {
        $displayLego = '';
        foreach ($legoSets as $set) {

            if ($set['retired'] == 0) {
                $buyLink = "<a href='" . $set['buy-URL'] . "' target='_new'>Buy " . $set['item-name'] . '</a>';
            } else {
                $buyLink = "<a class='retired'>Retired Product</a>";
            }

            if ($set['star-rating'] === '5') {
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

            $displayLego .= "<div class='legoItem'><div class='imageSpace'><img src='images/" . $set['image-URL'] . "' alt='" . $set['item-name'] . "'/></div>" .
                "<div><p>Name: <span class='info'>" . $set['item-name'] . '</span></p>' .
                "<p>Number of pieces: <span class='info'>" . $set['number-of-pieces'] . '</span></p>' .
                "<p>Age Category: <span class='info'>" . $set['age-category'] . '</span></p>' .
                "<p>Rating: <span class='starInfo'>$starRating</span></p></div>" .
                "<div class='buyLink'>$buyLink</div></div>";
        }
    }
    return $displayLego;
}