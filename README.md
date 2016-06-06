# \Bhaktaraz\RSSGenerator

`\Bhaktaraz\RSSGenerator` is RSS generator library for PHP 5.5 or later.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bhaktaraz/php-rss-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bhaktaraz/php-rss-generator/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/bhaktaraz/php-rss-generator/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bhaktaraz/php-rss-generator/build-status/master)

Implementation:

```php
<?php
$feed = new Feed();

$channel = new Channel();
$channel
	->title("Programming")
	->description("Programming with php")
	->url('http://bhaktaraz.com.np/?cat=2')
	->appendTo($feed);

// RSS item
$item = new Item();
$item
	->title("CACHING DATA IN SYMFONY2")
	->description("It is not too easy to enhance the performance of your application. In Symfony2 you could get benefit from caching.")
	->url('http://bhaktaraz.com.np/?p=194')
	->enclosure('http://bhaktaraz.com.np/wp-content/uploads/2014/08/bhakta-672x372.jpg', 4889, 'audio/mpeg')
	->appendTo($channel);


echo $feed;
```

Output:

```xml
<?xml version="1.0"?>
<rss version="2.0">
  <channel>
    <title>Programming</title>
    <link>http://bhaktaraz.com.np/?cat=2</link>
    <description>Programming with php</description>
    <item>
      <title>CACHING DATA IN SYMFONY2</title>
      <link>http://bhaktaraz.com.np/?p=194</link>
      <description>It is not too easy to enhance the performance of your application. In Symfony2 you could get benefit from caching.</description>
      <enclosure url="http://bhaktaraz.com.np/wp-content/uploads/2014/08/bhakta-672x372.jpg" type="audio/mpeg" length="4889"/>
    </item>
  </channel>
</rss>
```

## Installation

You can install via Composer.

Add in your `composer.json` file:

```json
{
	"require": {
		"bhaktaraz/php-rss-generator": "dev-master"
	}
}
```

Run composer to install.

```
$ composer update
```

