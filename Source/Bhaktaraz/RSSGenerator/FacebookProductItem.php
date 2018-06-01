<?php

namespace Bhaktaraz\RSSGenerator;

use Bhaktaraz\RSSGenerator\ItemInterface;
use Bhaktaraz\RSSGenerator\ChannelInterface;
use Bhaktaraz\RSSGenerator\SimpleXMLElement;

class FacebookProductItem implements ItemInterface
{
    /** @var integer */
    protected $id;

    /** @var string */
    protected $title;

    /** @var string */
    protected $url;

    /** @var string */
    protected $availability;

    /** @var string */
    protected $condition;

    /** @var string */
    protected $price;

    /** @var string */
    protected $googleProductCategory;

    /** @var string */
    protected $imageLink;

    /** @var string */
    protected $description;

    /** @var string */
    protected $brand;

    /** @var  string */
    protected $content;

    /** @var  string */
    protected $creator;

    /** @var array */
    protected $categories = [];

    /** @var string */
    protected $guid;

    /** @var bool */
    protected $isPermalink;

    /** @var int */
    protected $pubDate;

    /** @var array */
    protected $enclosure;

    /**
     * Set item id
     * @param integer $id
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set item title
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set item URL
     * @param string $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set item description
     * @param string $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set item brand
     * @param string $brand
     * @return $this
     */
    public function brand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Set item availability
     * @param string $availability
     * @return $this
     */
    public function availability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Set item condition
     * @param string $condition
     * @return $this
     */
    public function condition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Set item price
     * @param string $price
     * @return $this
     */
    public function price($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set item googleProductCategory
     * @param string $googleProductCategory
     * @return $this
     */
    public function googleProductCategory($googleProductCategory)
    {
        $this->googleProductCategory = $googleProductCategory;

        return $this;
    }

    /**
     * Set item imageLink
     * @param string $imageLink
     * @return $this
     */
    public function imageLink($imageLink)
    {
        $this->imageLink = $imageLink;

        return $this;
    }


    /**
     * Set item category
     * @param string $name Category name
     * @param string $domain Category URL
     * @return $this
     */
    public function category($name, $domain = null)
    {
        $this->categories[] = [$name, $domain];

        return $this;
    }

    /**
     * Set GUID
     * @param string $guid
     * @param bool $isPermalink
     * @return $this
     */
    public function guid($guid, $isPermalink = false)
    {
        $this->guid = $guid;
        $this->isPermalink = $isPermalink;

        return $this;
    }

    /**
     * Set published date
     * @param int $pubDate Unix timestamp
     * @return $this
     */
    public function pubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Set enclosure
     * @param string $url Url to media file
     * @param int $length Length in bytes of the media file
     * @param string $type Media type, default is audio/mpeg
     * @return $this
     */
    public function enclosure($url, $length = 0, $type = 'audio/mpeg')
    {
        $this->enclosure = ['url' => $url, 'length' => $length, 'type' => $type];

        return $this;
    }

    /**
     * Append item to the channel
     * @param ChannelInterface $channel
     * @return $this
     */
    public function appendTo(ChannelInterface $channel)
    {
        $channel->addItem($this);

        return $this;
    }

    /**
     * Set author name for article
     *
     * @param $creator
     * @return $this
     */
    public function creator($creator)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @param $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><item></item>', LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        $xml->addChild('g:id', $this->title, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:title', $this->title, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:link', $this->url, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:description', $this->description, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:availability', $this->availability, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:price', $this->price, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:condition', $this->condition, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:google_product_category', $this->googleProductCategory, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:image_link', $this->imageLink, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:brand', $this->brand, 'http://base.google.com/ns/1.0');

        return $xml;
    }
}
