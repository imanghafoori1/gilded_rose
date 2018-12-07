<?php

class Ticket extends BaseItem implements Item
{

    public $afterSellIn = -51;

    public function preSellIn()
    {
        $this->quality->add(+1);
        if ($this->sellIn < 10) {
            $this->quality->add(+1);
        }
        if ($this->sellIn < 5) {
            $this->quality->add(+1);
        }
    }
}