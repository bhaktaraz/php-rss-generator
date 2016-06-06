<?php

use Bhaktaraz\RSSGenerator\Item;
use Bhaktaraz\RSSGenerator\Feed;
use Bhaktaraz\RSSGenerator\Channel;

require 'vendor/autoload.php';

$feed = new Feed();
$channel = new Channel();
$channel
    ->title("Channel Title")
    ->description("Channel Description")
    ->url('http://bhaktaraz.com.np')
    ->language('en-US')
    ->copyright('Copyright 2015, Bhaktaraz')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->lastBuildDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->ttl(60)
    ->appendTo($feed);

$item = new Item();
$item
    ->title("Item Title")
    ->description("Item body")
    ->url('http://bhaktaraz.com.np/?p=2')
    ->pubDate(strtotime('Mon, 03 Aug 2015 10:22:02 +0550'))
    ->guid('http://bhaktaraz.com.np/?p=2', true)
    ->appendTo($channel);


echo $feed; // or echo $feed->render();
