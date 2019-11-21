<?php
// function add all image into a mobile object (is an array ), 5 images and the first is logo
function linkImageAndMobile(&$mobile = [], $logoImage = [], $otherImage = [])
{
    // firstly, base image is insert so that key = 0
    array_push($mobile, $logoImage[0]['url']);
    // then, insert other image
    for ($i = 0; $i < sizeof($otherImage); $i++) {
        array_push($mobile, $otherImage[$i]['url']);
    }
}
