<?php

namespace Bhaktaraz\RSSGenerator;

use Bhaktaraz\RSSGenerator\ItemInterface;
use Bhaktaraz\RSSGenerator\ChannelInterface;
use Bhaktaraz\RSSGenerator\SimpleXMLElement;

class Item implements ItemInterface
{

    /** @var string */
    protected $title;

    /** @var string */
    protected $url;

    /** @var string */
    protected $description;

    /** @var object */
    protected $image;

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
     * Set item image
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
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><item></item>',
            LIBXML_NOERROR | LIBXML_ERR_NONE | LIBXML_ERR_FATAL);
        $xml->addChild('title', $this->title);
        $xml->addChild('link', $this->url);
        if ($this->pubDate !== null) {
            $xml->addChild('pubDate', date(DATE_RSS, $this->pubDate));
        }

        if ($this->creator) {
            $xml->addChildCData("xmlns:dc:creator", $this->creator);
        }
        if ($this->guid) {
            $guid = $xml->addChild('guid', $this->guid);

            if ($this->isPermalink === false) {
                $guid->addAttribute('isPermaLink', 'false');
            }
        }

        foreach ($this->categories as $category) {
            $element = $xml->addChild('category', $category[0]);

            if (isset($category[1])) {
                $element->addAttribute('domain', $category[1]);
            }
        }

        $xml->addChild('description', $this->description);
        if(strlen(trim($this->content)) > 0) {
            $xml->addChildCData('xmlns:content:encoded', $this->content);
        }

        if (is_array($this->enclosure) && (count($this->enclosure) == 3)) {
            $element = $xml->addChild('enclosure');
            $element->addAttribute('url', $this->enclosure['url']);
            $element->addAttribute('type', $this->enclosure['type']);

            if ($this->enclosure['length']) {
                $element->addAttribute('length', $this->enclosure['length']);
            }
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

        return $xml;
    }
}
