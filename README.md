# Coin-Calculator
Calculate amount and worth of a certain amount of coins by their weight.

# To Use
- Include the **coin_calculator.php** class.
```php
require "coin_calculator.php";
```
- Initiate the class by passing it the required parameters
```php
$weight = 500; // total weight of the coins
$weightType = 1; // set 1 for Pounds, 2 for Grams
$toCalculate = 1; // 1 = Quarters, 2 = Dimes, 3 = Nickles, 4 = Pennies
$calc = new Coin_Calculator($weight, $weightType, $toCalculate);
```
- Get the total amount that the coins are worth without formatting
```php
$calc->getAmount();
```
With formatting
```php
$calc->getAmount(true);
```
- Get the total amount of coins without formatting
```php
$calc->getCoinsInHand();
```
With formatting
```php
$calc->getCoinsInHand(true);
```
- Get the weight type name as a string
```php
Weights::getWeightName($calc->getWeightType())
```
# Supported Coins
- Quarters
- Dimes
- Nickles
- Pennies

# Supported Weights
- Pounds
- Grams
