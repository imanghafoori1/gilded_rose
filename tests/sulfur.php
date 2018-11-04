<?php


$item = new GildedRose('گوگرد', 10, 5);
$item->tick();
assert($item->getQuality() == 10, 'updates Sulfur items before the sell date');
assert($item->getSellIn() == 5, 'updates Sulfur items before the sell date');



$item = new GildedRose('گوگرد', 10, 5);
$item->tick();
assert($item->getQuality() == 10, 'updates Sulfur items on the sell date');
assert($item->getSellIn() == 5, 'updates Sulfur items on the sell date');



$item = new GildedRose('گوگرد', 10, -1);
$item->tick();
assert($item->getQuality() == 10, 'updates Sulfur items after the sell date');
assert($item->getSellIn() == -1, 'updates Sulfur items after the sell date');
