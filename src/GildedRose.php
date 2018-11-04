<?php

class GildedRose
{
    public $name;

    private $quality;

    private $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    public function tick()
    {
        if ($this->name != 'ترشی' and $this->name != 'بلیت هواپیما') {
            if ($this->quality > 0) {
                if ($this->name != 'گوگرد') {
                    $this->quality = $this->quality - 1;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;

                if ($this->name == 'بلیت هواپیما') {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                }
            }
        }

        if ($this->name != 'گوگرد') {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != 'ترشی') {
                if ($this->name != 'بلیت هواپیما') {
                    if ($this->quality > 0) {
                        if ($this->name != 'گوگرد') {
                            $this->quality = $this->quality - 1;
                        }
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }
    }
}


