<?php

namespace UnasOnline\UnasConnect\Utils;

use SimpleXMLElement;

class Xml
{
    /**
     * Recursively convert xml to php array
     *
     * @return array
     */
    public static function simpleXmlToArray($xml)
    {
        $array = (array)$xml;

        if (count($array) === 0) {
            return (string)$xml;
        }

        foreach ($array as $key => $value) {
            if ((!is_object($value) || strpos(get_class($value), 'SimpleXML') === false) && !is_array($value)) {
                continue;
            }
            $array[$key] = self::simpleXmlToArray($value);
        }

        return (array)$array;
    }
}
