<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase {

    public function testSuccessLegoCollection()
    {
        $input = [
            ['item-name' => 'item1','image-URL'=> 'image1','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'5','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item2','image-URL'=> 'image2','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'4','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item3','image-URL'=> 'image3','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'3','buy-URL'=>'url 1','retired'=>0],
            ['item-name' => 'item4','image-URL'=> 'image4','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'2','buy-URL'=>'url 1','retired'=>1],
            ['item-name' => 'item5','image-URL'=> 'image5','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'1','buy-URL'=>'url 1','retired'=>0]
        ];
        $case = legoCollection($input);
        $this->assertIsString($case);
    }

    public function testSuccessTwoLegoCollection()
    {
        $expected = "<div class='legoItem'><div class='imageSpace'><img src='images/image1' alt='item1'/></div><div><p>Name: <span class='info'>item1</span></p><p>Number of pieces: <span class='info'>100</span></p><p>Age Category: <span class='info'>10</span></p><p>Rating: <span class='starInfo'> &#9733 &#9733 &#9733 &#9733 &#9733</span></p></div><div class='buyLink'><a href='url1' target='_new'>Buy item1</a></div></div>";
        $input = [['item-name' => 'item1','image-URL'=> 'image1','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'5','buy-URL'=>'url1','retired'=>0],];
        $case = legoCollection($input);
        $this->assertEquals($expected,$case);
    }


    public function testFailureLegoCollection() {
        $expected = 'I can\'t find any lego sets at the moment, please try again later.';
        $input = [];
        $case = legoCollection($input);
        $this->assertEquals($expected, $case);
    }


    public function testMalformedLegoCollection(){
        $input = 3;
        $this->expectException(TypeError::class);
        legoCollection($input);
    }

    public function testSuccessCleanseData() {
        $expected = ['&amp;','&quot;','&lt;','&gt;'];
        $input = ['&','"','<','>'];
        $case = cleanseData($input);
        $this->assertEquals($expected, $case);
    }

    public function testSuccessTwoCleanseData() {
        $expected = ['this string has no special characters'];
        $input = ['this string has no special characters'];
        $case = cleanseData($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureCleanseData() {
        $expected =['Error: please try again'];
        $input = [['and'=>'&'],['lessThan'=>'<']];
        $case = cleanseData($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedCleanseData() {
        $input = 3;
        $this->expectException(TypeError::class);
        cleanseData($input);
    }

    public function testSuccessFormSubmitted() {
        $expected = 1;
        $input = ['item-name' => 'item1','number-of-pieces'=>'100','age-category'=>'10','star-rating'=>'5','retired'=>0];
        $case = formSubmitted($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureFormSubmitted() {
        $expected = 0;
        $input = [];
        $case = formSubmitted($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureTwoFormSubmitted() {
        $expected = 0;
        $input = ['greeting'=>'hello'];
        $case = formSubmitted($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedFormSubmitted() {
        $input = 3;
        $this->expectException(TypeError::class);
        formSubmitted($input);
    }
}