<?php

/*
    "tickets", like aged brie, increases in Quality as it's SellIn
    value approaches; Quality increases by 2 when there are 10 days or
    less and by 3 when there are 5 days or less but Quality drops to
    0 after the flight
 */

$item = new GildedRose('بلیت هواپیما', 10, 11);
$item->tick();
assert($item->getQuality() == 11, 'updates ticket items long before the sell date');
assert($item->getSellIn() == 10, 'updates ticket items long before the sell date');



$item = new GildedRose('بلیت هواپیما', 10, 10);
$item->tick();
assert($item->getQuality() == 12, 'updates ticket items close to the sell date');
assert($item->getSellIn() == 9, 'updates ticket items close to the sell date');



$item = new GildedRose('بلیت هواپیما', 50, 10);
$item->tick();
assert($item->getQuality() == 50, 'updates ticket items close to the sell data, at max quality');
assert($item->getSellIn() == 9, 'updates ticket items close to the sell data, at max quality');



$item = new GildedRose('بلیت هواپیما', 10, 5);
$item->tick();
assert($item->getQuality() == 13); // goes up by,'updates ticket items very close to the sell date' 3
assert($item->getSellIn() == 4, 'updates ticket items very close to the sell date');



$item = new GildedRose('بلیت هواپیما', 50, 5);
$item->tick();
assert($item->getQuality() == 50, 'updates ticket items very close to the sell date, at max quality');
assert($item->getSellIn() == 4, 'updates ticket items very close to the sell date, at max quality');



$item = new GildedRose('بلیت هواپیما', 10, 1);
$item->tick();
assert($item->getQuality() == 13, 'updates ticket items with one day left to sell');
assert($item->getSellIn() == 0, 'updates ticket items with one day left to sell');



$item = new GildedRose('بلیت هواپیما', 50, 1);
$item->tick();
assert($item->getQuality() == 50, 'updates ticket items with one day left to sell, at max quality');
assert($item->getSellIn() == 0, 'updates ticket items with one day left to sell, at max quality');



$item = new GildedRose('بلیت هواپیما', 10, 0);
$item->tick();
assert($item->getQuality() == 0, 'updates ticket items on the sell date');
assert($item->getSellIn() == -1, 'updates ticket items on the sell date');



$item = new GildedRose('بلیت هواپیما', 10, -1);
$item->tick();
assert($item->getQuality() == 0, 'updates ticket items after the sell date');
assert($item->getSellIn() == -2, 'updates ticket items after the sell date');
