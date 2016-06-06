<?php

namespace Bhaktaraz\RSSGenerator;

use SimpleXMLElement as XMLElement;

class SimpleXMLElement extends XMLElement
{

    /**
     * @param string $name
     * @param string $value
     * @param string $namespace
     * @return XMLElement
     */
    public function addChild($name, $value = null, $namespace = null)
    {
        if ($value !== null and is_string($value) === true) {
            $value = str_replace('&', '&amp;', $value);
        }

        return parent::addChild($name, $value, $namespace);
    }

    /**
     * Create a child with CDATA value
     * @param string $name The name of the child element to add.
     * @param string $cdata_text The CDATA value of the child element.
     */
    public function addChildCData($name, $cdata_text)
    {
        $child = $this->addChild($name);
        $child->addCData($cdata_text);
    }

    /**
     * Add CDATA text in a node
     * @param string $cdata_text The CDATA value  to add
     */
    private function addCData($cdata_text)
    {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($cdata_text));
    }
}
