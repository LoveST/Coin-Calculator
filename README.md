# Coin-Calculator
Calculate amount and worth of a certain amount of coins by their weight.

# To Use
- Include the **coin_calculator.php** class.
```php
required "coin_calculator.php";
```
- Initiate the class by passing it the required parameters
```php
$weight = 500; // total weight of the coins
$weightType = 1; // set 1 for Pounds, 2 for Grams
$toCalculate = 1; // 1 = Quarters, 2 = Dimes, 3 = Nickles, 4 = Pennies
$calc = new Coin_Calculator($weight, $weightType, $toCalculate);
```
- Get the results
Get the raw amount that the coins are worth
```php
$calc->getAmount();
```
Get the actual amount that the coins are worth in a dollar formatted text
```php
$calc->getAmount(true);
```
