<?php

$db = new PDO('mysql:host=db; dbname=lily-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT `item-name`,`image-URL`,`number-of-pieces`,`age-category`,`star-rating`,`buy-URL`,`retired` FROM `lego-sets`");
$query->execute();

$legoSets = $query->fetchAll();

foreach($legoSets as $set){
    echo  "<img src='images/". $set['image-URL']. "' height='150px'/> <br> Name: " . $set['item-name'] ."<br> Number of pieces: ". $set['number-of-pieces']."<br> Age Category: ".$set['age-category']."<br> Star Rating: ".$set['star-rating']." <a href='".$set['buy-URL']."'> <br>Buy ". $set['item-name'] . '</a> <br>Retired: '.$set['retired'].'<br>';
}