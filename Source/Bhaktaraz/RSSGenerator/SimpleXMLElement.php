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
}
