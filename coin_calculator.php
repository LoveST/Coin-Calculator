<?

class Coin_Calculator
{

    private $weightType; // (Weights::class => int) to hold the coins weight type
    private $weight = 0; // (int) to hold the weight of the coins
    private $amount = 0; // (double) to hold the total amount of the coins
    private $toCalculate = 1;
    const QUARTER = 5.67;
    const QUARTER_WORTH = 0.25;
    const DIME = 2.268;
    const DIME_WORTH = 0.10;
    const NICKEL = 5;
    const NICKEL_WORTH = 0.05;
    const PENNY = 2.5;
    const PENNY_WORTH = 0.01;

    /**
     * Class constructor
     * @param $coinsWeight => total weight of the coins
     * @param $weightType => the type of the weight, default: Weights::Pounds
     * @param $calculate => what to calculate => (1 = Quarters)(2 = Dimes)(3 = Nickels)(4 = Peenies)
     * @return boolean
     */
    public function __construct($coinsWeight, $weightType = Weights::POUNDS, $calculate = 1)
    {

        // set the total weight of the coins
        $this->setWeight($coinsWeight);

        // set the weight type 
        $this->setWeightType($weightType);

        $this->toCalculate = $calculate;

        // calculate the needed type of coins
        switch ($calculate) {
            case 1:
                $this->calculate(Coin_Calculator::QUARTER, Coin_Calculator::QUARTER_WORTH); // if 1 then calculate quarters
                break;
            case 2:
                $this->calculate(Coin_Calculator::DIME, Coin_Calculator::DIME_WORTH); // if 2 then calculate dimes
                break;
            case 3:
                $this->calculate(Coin_Calculator::NICKEL, Coin_Calculator::NICKEL_WORTH); // if 3 then calculate nickles
                break;
            case 4:
                $this->calculate(Coin_Calculator::PENNY, Coin_Calculator::PENNY_WORTH); // if 4 then calculate peenies
                break;
            default:
                $this->calculate(Coin_Calculator::QUARTER, Coin_Calculator::QUARTER_WORTH); // if anything else then calcualte quarters
                break;
        }
        return true;
    }

    /**
     * set the weight type ( grams or pounds )
     * @param $weight_Type
     */
    private function setWeightType($weight_Type = Weights::POUNDS)
    {
        $this->weightType = $weight_Type;
    }

    /**
     * set the weight of the coins
     * @param $coinsWeight
     * @return void
     */
    private function setWeight($coinsWeight = 0)
    {
        $this->weight = $coinsWeight;
    }

    /**
     * set the total amount of worth for the coins
     * @param int $totalAmount
     */
    private function setAmount($totalAmount)
    {
        $this->amount = $totalAmount;
    }

    /**
     * get the weight of the coins
     * @return double
     */
    private function getWeight()
    {
        $results = 0;

        // check the given weight type
        switch ($this->getWeightType()) {
            case 1:
                $results = $this->weight;
                break;
            case 2:
                $results = $this->weight / Weights::POUND_AMOUNT;
                break;
        }

        // return the resulted weight as pounds
        return $results;
    }

    /**
     * get the desired coins weight in pounds
     * @return int
     */
    public function getCoinsWeight()
    {
        $results = 0;

        // check the given weight type
        switch ($this->getWeightType()) {
            case Weights::POUNDS:
                $results = $this->weight;
                break;
            case Weights::GRAMS:
                $results = $this->weight / Weights::POUND_AMOUNT;
                break;
        }

        // return the resulted weight as pounds
        return number_format(($results), 2);
    }

    /**
     * get the weight type
     * @return int
     */
    public function getWeightType()
    {
        return $this->weightType;
    }

    /**
     * get the total amount worth for the coins
     * @param bool $isFormatted
     * @return double
     */
    public function getAmount($isFormatted = false)
    {
        // check if format is needed
        if ($isFormatted) {
            return number_format(round($this->amount, 2), 2);
        } else {
            return $this->amount;
        }
    }

    /**
     * get total coins in hand
     * @param bool $isFormatted
     * @return int
     */
    public function getCoinsInHand($isFormatted = false)
    {
        // get total coins in hand
        $total = ($this->getWeight() * Weights::POUND_AMOUNT) / $this->getSelectedCoinWeight();

        // check if format is needed
        if ($isFormatted) {
            return number_format($total, 0);
        } else {
            return $total;
        }
    }

    /**
     * get the selected coin weight
     * @return double
     */
    private function getSelectedCoinWeight()
    {
        switch ($this->toCalculate) {
            case 1:
                $result = Coin_Calculator::QUARTER;
                break;
            case 2:
                $result = Coin_Calculator::DIME;
                break;
            case 3:
                $result = Coin_Calculator::NICKEL;
                break;
            case 4:
                $result = Coin_Calculator::PENNY;
                break;
            default:
                $result = Coin_Calculator::QUARTER;
                break;
        }
        return $result;
    }

    /**
     * calculate the amount of money by using the coin weight and coin worth by pounds
     * @param $coinWeight
     * @param $coinWorth
     * @return bool
     */
    private function calculate($coinWeight, $coinWorth)
    {

        // get the weight in pounds
        $weight = $this->getWeight();

        // calculate the total coins
        $totalCoins = ($weight * Weights::POUND_AMOUNT) / $coinWeight;

        // calculate how much they worth
        $totalWorth = $totalCoins * $coinWorth;

        // set the $amount variable for the client to get it via
        // getAmount();
        $this->setAmount($totalWorth);

        return true;
    }

}

class Weights
{

    const POUNDS = 1;
    const POUND_AMOUNT = 453.59237;
    const GRAMS = 2;
    const GRAMS_AMOUNT = 0.00220462;

    public static function getWeightName($weightType)
    {
        switch ($weightType) {
            case Weights::POUNDS:
                return "Pound";
                break;
            case Weights::GRAMS:
                return "Gram";
                break;
            default:
                return "Pound";
                break;
        }
    }

}
