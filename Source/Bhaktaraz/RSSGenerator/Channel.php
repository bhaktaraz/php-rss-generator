<?php

namespace Bhaktaraz\RSSGenerator;

use Bhaktaraz\RSSGenerator\FeedInterface;
use Bhaktaraz\RSSGenerator\ItemInterface;
use Bhaktaraz\RSSGenerator\SimpleXMLElement;
use Bhaktaraz\RSSGenerator\ChannelInterface;

class Channel implements ChannelInterface
{

    /** @var string */
    protected $title;

    /** @var string */
    protected $url;

    /** @var string */
    protected $atomLinkSelf;

    /** @var string */
    protected $description;
		
    /** @var object */
    protected $image;

    /** @var string */
    protected $language;

    /** @var string */
    protected $copyright;

    /** @var int */
    protected $pubDate;

    /** @var int */
    protected $lastBuildDate;

    /** @var  string */
    protected $updatePeriod;

    /** @var integer */
    protected $updateFrequency;

    /** @var int */
    protected $ttl;

    /** @var ItemInterface[] */
    protected $items = [];

    /**
     * Set channel title
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set channel URL
     * @param string $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set atom:link with rel="self"
     * @param string $atomLinkSelf
     * @return $this
     */
    public function atomLinkSelf($atomLinkSelf)
    {
        $this->atomLinkSelf = $atomLinkSelf;

        return $this;
    }

    /**
     * Set channel description
     * @param string $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }
		
    /**
     * Set channel image
     * 
     * The url is the image URL.
     * The title is used as the alt attribute if the image is used in HTML.
     * The link should be the URL of the site.
     * 
     * @param string $url
     * @param string $title
     * @param string $link
     * @param integer $width optional
     * @param integer $height optional
     * @param string $description optional
     * @return $this
     */
    public function image($url, $title, $link, $width = null, $height = null, $description = null)
    {
        $this->image = (object) [];
        $this->image->url = $url;
        $this->image->title = $title;
        $this->image->link = $link;
        $this->image->width = $width;
        $this->image->height = $height;
        $this->image->description = $description;
        return $this;
    }

    /**
     * Set ISO639 language code
     *
     * The language the channel is written in. This allows aggregators to group all
     * Italian language sites, for example, on a single page. A list of allowable
     * values for this element, as provided by Netscape, is here. You may also use
     * values defined by the W3C.
     *
     * @param string $language
     * @return $this
     */
    public function language($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Set channel copyright
     * @param string $copyright
     * @return $this
     */
    public function copyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * Set channel published date
     * @param int $pubDate Unix timestamp
     * @return $this
     */
    public function pubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Set channel last build date
     * @param int $lastBuildDate Unix timestamp
     * @return $this
     */
    public function lastBuildDate($lastBuildDate)
    {
        $this->lastBuildDate = $lastBuildDate;

        return $this;
    }

    /**
     * @param $updatePeriod
     * @return $this
     */
    public function updatePeriod($updatePeriod)
    {
        $this->updatePeriod = $updatePeriod;

        return $this;
    }

    /**
     * @param $updateFrequency
     * @return $this
     */
    public function updateFrequency($updateFrequency)
    {
        $this->updateFrequency = $updateFrequency;

        return $this;
    }

    /**
     * Set channel ttl (minutes)
     * @param int $ttl
     * @return $this
     */
    public function ttl($ttl)
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * Add item object
     * @param ItemInterface $item
     * @return $this
     */
    public function addItem(ItemInterface $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Append to feed
     * @param FeedInterface $feed
     * @return $this
     */
    public function appendTo(FeedInterface $feed)
    {
        $feed->addChannel($this);

        return $this;
    }

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><channel></channel>',
            LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);
        $xml->addChild('title', $this->title);
        $xml->addChild('link', $this->url);
        $xml->addChild('description', $this->description);
        $link = $xml->addChild('xmlns:atom:link');
        $link->addAttribute('href', $this->atomLinkSelf);
        $link->addAttribute('rel', 'self');
        $link->addAttribute('type', 'application/rss+xml');

        if ($this->language !== null) {
            $xml->addChild('language', $this->language);
        }
				
        if ($this->image !== null) {
            $image = $xml->addChild('image');
            $image->addChild('url', $this->image->url);
            $image->addChild('title', $this->image->title);
            $image->addChild('link', $this->image->link);
            if (!empty($this->image->width)) $image->addChild('width', $this->image->width);
            if (!empty($this->image->height)) $image->addChild('height', $this->image->height);
            if (!empty($this->image->description)) $image->addChild('description', $this->image->description);
        }

        if ($this->updatePeriod) {
            $xml->addChild("xmlns:sy:updatePeriod", $this->updatePeriod);
        }

        if ($this->updateFrequency) {
            $xml->addChild("xmlns:sy:updateFrequency", $this->updateFrequency);
        }

        if ($this->copyright !== null) {
            $xml->addChild('copyright', $this->copyright);
        }

        if ($this->pubDate !== null) {
            $xml->addChild('pubDate', date(DATE_RSS, $this->pubDate));
        }

        if ($this->lastBuildDate !== null) {
            $xml->addChild('lastBuildDate', date(DATE_RSS, $this->lastBuildDate));
        }

        if ($this->ttl !== null) {
            $xml->addChild('ttl', $this->ttl);
        }

        foreach ($this->items as $item) {
            $toDom = dom_import_simplexml($xml);
            $fromDom = dom_import_simplexml($item->asXML());
            $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
        }

        return $xml;
    }
}
