<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase {

    public function testSuccessLegoCollection()
    {
        //define the input for the test to get the expected result
        $input = [
            ['item-name' => 'item1','image-URL'=> 'image1','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'5','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item2','image-URL'=> 'image2','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'4','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item3','image-URL'=> 'image3','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'3','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item4','image-URL'=> 'image4','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'2','buy-URL'=>'url 1','retired'=>1],
            ['item-name' => 'item5','image-URL'=> 'image5','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'1','buy-URL'=>'url 1','retired'=>0]
        ];
        //run the real function and pass in the input
        $case = legoCollection($input);
        //compare the expected result with the actual result
        $this->assertIsString($case);
    }

    public function testSuccessTwoLegoCollection()
    {
        //expect the result of the test
        $expected = "<div class='legoItem'><div class='imageSpace'><img src='images/image1' alt='item1'/></div><div><p>Name: <span class='info'>item1</span></p><p>Number of pieces: <span class='info'>100</span></p><p>Age Category: <span class='info'>10</span></p><p>Rating: <span class='starInfo'> &#9733 &#9733 &#9733 &#9733 &#9733</span></p></div><div class='buyLink'><a href='url1' target='_new'>Buy item1</a></div></div>";
        //define the input for the test to get the expected result
        $input = [
            ['item-name' => 'item1','image-URL'=> 'image1','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'5','buy-URL'=>'url1','retired'=>0],
        ];
        //run the real function and pass in the input
        $case = legoCollection($input);
        //compare the expected result with the actual result
        $this->assertEquals($expected,$case);
    }


        public function testFailureLegoCollection() {
            $expected = 'I can\'t find any lego sets at the moment, please try again later.';
            $input = [];
            $case = legoCollection($input);
            $this->assertEquals($expected, $case);
        }


        public function testMalformedLegoCollection(){
            //input to test how it deals with an array
            $input = 3;
            //set the test up to expect a specific error to be thrown by PHP
            $this->expectException(TypeError::class);
            //run the real function and pass the array in.
            legoCollection($input);
        }
}