<?php

namespace FlSouto;

class HtAttrStyle extends \ArrayObject {
    function __toString()
    {
        $attrs = [];
        foreach($this as $k => $v){
            $attrs[] = $k.':'.$v;
        }
        return implode(';',$attrs);
    }
}