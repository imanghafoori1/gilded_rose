<?php
class Quality {

    private $amount;

    const max = 50;
    const min = 0;

    public function __construct($quality)
    {
        $this->amount = $quality;
    }

    public function add($amount)
    {
        $this->amount += $amount;

        if($this->amount < self::min) {
            $this->amount = self::min;
        }

        if($this->amount > self::max) {
            $this->amount = self::max;
        }
    }


    public function getAmount()
    {
        return $this->amount;
    }
}