<?php

// if no keyword has been specified then don't run the script
if (!isset($_GET['keyword'])) {
    die("");
}

// include the required class file
include "coin_calculator.php";

// get the required variables
$weight = $_GET['keyword'];
$weightType = $_GET['weightType'];
$toCalculate = $_GET['calculate'];

// initiate the Coin Calculator class
use LoveST\Coin_Calculator, LoveST\Weights;
$calc = new Coin_Calculator($weight, $weightType, $toCalculate);

// get the required variables and set it in the array
$array = Array(
    "weight" => number_format($weight, 2),
    "worth" => $calc->getAmount(true),
    "quantity" => $calc->getCoinsInHand(true),
    "weightType" => Weights::getWeightName($calc->getWeightType())
);

// print the results back as json encoded text
echo json_encode($array);
