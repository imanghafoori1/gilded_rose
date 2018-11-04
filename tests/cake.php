<?php

$item = new GildedRose('کیک خامه ای', 10, 10);

$item->tick();

assert($item->getQuality() == 8, 'updates cream cake items before the sell date');
assert($item->getSellIn() == 9, 'updates cream cake items before the sell date');

$item = new GildedRose('کیک خامه ای', 0, 10);

$item->tick();

assert($item->getQuality() == 0, 'updates cream cake items at zero quality');
assert($item->getSellIn() == 9, 'updates cream cake items at zero quality');

$item = new GildedRose('کیک خامه ای', 10, 0);

$item->tick();

assert($item->getQuality() == 6, 'updates cream cake items on the sell date');
assert($item->getSellIn() == -1, 'updates cream cake items on the sell date');

$item = new GildedRose('کیک خامه ای', 0, 0);

$item->tick();

assert($item->getQuality() == 0, 'updates cream cake items on the sell date at 0 quality');
assert($item->getSellIn() == -1, 'updates cream cake items on the sell date at 0 quality');

$item = new GildedRose('کیک خامه ای', 10, -10);

$item->tick();

assert($item->getQuality() == 6, 'updates cream cake items after the sell date');
assert($item->getSellIn() == -11, 'updates cream cake items after the sell date');

$item = new GildedRose('کیک خامه ای', 0, -10);

$item->tick();

assert($item->getQuality() == 0, 'updates cream cake items after the sell date at zero quality');
assert($item->getSellIn() == -11, 'updates cream cake items after the sell date at zero quality');
