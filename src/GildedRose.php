<?php
$ds = DIRECTORY_SEPARATOR;

require __DIR__.$ds.'Quality.php';
require __DIR__.$ds.'Items'.$ds.'ItemFactory.php';
require __DIR__.$ds.'Items'.$ds.'BaseItem.php';
require __DIR__.$ds.'Items'.$ds.'Cake.php';
require __DIR__.$ds.'Items'.$ds.'Sulfur.php';
require __DIR__.$ds.'Items'.$ds.'Ticket.php';
require __DIR__.$ds.'Items'.$ds.'Torshi.php';
require __DIR__.$ds.'Items'.$ds.'Normal.php';

ItemFactory::instance('گوگرد', 'Sulfur');
ItemFactory::instance('عادی', 'Normal');
ItemFactory::instance('ترشی', 'Torshi');
ItemFactory::instance('بلیت هواپیما', 'Ticket');
ItemFactory::instance('کیک خامه ای', 'Cake');


interface Item {
    public function updateSaleIn();
    public function preSellIn();
    public function afterSellIn();
}

class GildedRose
{
    /**
     * @var Item
     */
    private $item;

    public function __construct($name, $quality, $sellIn)
    {
        // Fail Fast
        $item = ItemFactory::makeItemObj($name, [$quality, $sellIn]);
        $this->addItem($item);
    }

    public function getQuality()
    {
        return $this->item->quality->getAmount();
    }

    public function getSellIn()
    {
        return $this->item->sellIn;
    }

    // High Level Code
    public function tick()
    {
        $this->item->updateSaleIn(); // It is a "Command"

        $m = $this->item->sellIn >= 0 ? 'preSellIn': 'afterSellIn';
        $this->item->$m();
    }

    private function addItem(Item $item)
    {
        $this->item = $item;
    }
}


