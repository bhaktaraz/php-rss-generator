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

    /** @var string */
    protected $gtin;

    /** @var string */
    protected $mpn;

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

    /** @var string */
    protected $size;

    /** @var string */
    protected $material;

    /** @var string */
    protected $additionalImageLink;

    /** @var string */
    protected $color;

    /** @var string */
    protected $gender;

    /** @var string */
    protected $ageGroup;

    /** @var integer */
    protected $itemGroupId;

    /** @var string */
    protected $customLabel0;

    /** @var string */
    protected $customLabel1;

    /** @var string */
    protected $customLabel2;

    /** @var string */
    protected $customLabel3;

    /** @var string */
    protected $customLabel4;

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
     * Set item brand - Name of the brand.
     * @param string $brand
     * @return $this
     */
    public function brand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Set item gtin - Global Trade Item Number (GTINs) can include UPC, EAN, JAN, and ISBN.
     * @param string $gtin
     * @return $this
     */
    public function gtin($gtin)
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Set item mpn -Unique manufacturer ID for product.
     * @param string $mpn
     * @return $this
     */
    public function mpn($mpn)
    {
        $this->mpn = $mpn;

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
     * @param $size - Size of item. For example, a shirt may be Small or XL.
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @param $material - Material product is made of such as leather, denim, or cotton.
     * @return $this
     */
    public function material($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * @param $additionalImageLink - You can include up to 10 additional images; provide them as comma-separated URLs.
     * @return $this
     */
    public function additionalImageLink($additionalImageLink)
    {
        $this->additionalImageLink = $additionalImageLink;

        return $this;
    }

    /**
     * @param $color - Item color.
     * @return $this
     */
    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param $gender - Options include: male, female, and unisex
     * @return $this
     */
    public function gender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @param $ageGroup - Age group for product. Accepted values are newborn, infant, toddler, kids, and adult.
     * @return $this
     */
    public function ageGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }

    /**
     * @param $itemGroupId - Optional, additional information about item.
     * @return $this
     */
    public function itemGroupId($itemGroupId)
    {
        $this->itemGroupId = $itemGroupId;

        return $this;
    }

    /**
     * @param $customLabel0 - Optional, additional information about item.
     * @return $this
     */
    public function customLabel0($customLabel0)
    {
        $this->customLabel0 = $customLabel0;

        return $this;
    }

    /**
     * @param $customLabel1 - Optional, additional information about item.
     * @return $this
     */
    public function customLabel1($customLabel1)
    {
        $this->customLabel1 = $customLabel1;

        return $this;
    }

    /**
     * @param $customLabel2 - Optional, additional information about item.
     * @return $this
     */
    public function customLabel2($customLabel2)
    {
        $this->customLabel2 = $customLabel2;

        return $this;
    }

    /**
     * @param $customLabel3 - Optional, additional information about item.
     * @return $this
     */
    public function customLabel3($customLabel3)
    {
        $this->customLabel3 = $customLabel3;

        return $this;
    }

    /**
     * @param $customLabel4 - Optional, additional information about item.
     * @return $this
     */
    public function customLabel4($customLabel4)
    {
        $this->customLabel4 = $customLabel4;

        return $this;
    }

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><item></item>', LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);

        $xml->addChild('g:id', $this->id, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:title', $this->title, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:link', $this->url, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:description', $this->description, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:availability', $this->availability, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:price', $this->price, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:condition', $this->condition, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:google_product_category', $this->googleProductCategory, 'http://base.google.com/ns/1.0');
        $xml->addChild('g:image_link', $this->imageLink, 'http://base.google.com/ns/1.0');

        if(!empty($this->brand)) {
            $xml->addChild('g:brand', $this->brand, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->gtin)) {
            $xml->addChild('g:gtin', $this->gtin, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->mpn)) {
            $xml->addChild('g:mpn', $this->mpn, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->size)) {
            $xml->addChild('g:size', $this->size, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->material)) {
            $xml->addChild('g:material', $this->material, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->additionalImageLink)) {
            $xml->addChild('g:additional_image_link', $this->additionalImageLink, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->color)) {
            $xml->addChild('g:color', $this->color, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->gender)) {
            $xml->addChild('g:gender', $this->gender, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->ageGroup)) {
            $xml->addChild('g:age_group', $this->ageGroup, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->itemGroupId)) {
            $xml->addChild('g:item_group_id', $this->itemGroupId, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->customLabel0)) {
            $xml->addChild('g:custom_label_0', $this->customLabel0, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->customLabel1)) {
            $xml->addChild('g:custom_label_1', $this->customLabel1, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->customLabel2)) {
            $xml->addChild('g:custom_label_2', $this->customLabel2, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->customLabel3)) {
            $xml->addChild('g:custom_label_3', $this->customLabel3, 'http://base.google.com/ns/1.0');
        }

        if(!empty($this->customLabel4)) {
            $xml->addChild('g:custom_label_4', $this->customLabel4, 'http://base.google.com/ns/1.0');
        }

        return $xml;
    }
}
