<?php


$item = new GildedRose('عادی', 10, 5); // quality, sell in X days
$item->tick();
assert($item->getQuality() == 9, 'updates normal items before sell date');
assert($item->getSellIn() == 4, 'updates normal items before sell date');


$item = new GildedRose('عادی', 10, 0);
$item->tick();
assert($item->getQuality() == 8 , 'updates normal items on the sell date');
assert($item->getSellIn() == -1 , 'updates normal items on the sell date');



$item = new GildedRose('عادی', 10, -5);
$item->tick();
assert($item->getQuality() == 8, 'updates normal items after the sell date');
assert($item->getSellIn() == -6, 'updates normal items after the sell date');


$item = new GildedRose('عادی', 0, 5);
$item->tick();
assert($item->getQuality() == 0, 'updates normal items with a quality of 0');
assert($item->getSellIn() == 4 , 'updates normal items with a quality of 0');