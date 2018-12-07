<?php

class Cake extends BaseItem implements Item
{
    public $preSellIn;
    public $afterSellIn;
    /**
     * Cake constructor.
     *
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn)
    {
        parent::__construct($quality, $sellIn);
        $normal = new Normal($quality, $sellIn);
        $this->preSellIn = $normal->preSellIn * 2;
        $this->afterSellIn = $normal->afterSellIn * 2;
    }
}