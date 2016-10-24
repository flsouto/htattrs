<?php

namespace FlSouto;


class HtAttrs extends \ArrayObject{

    function exchangeArray($input)
    {
        if(isset($input['style'])){
            if(is_array($input['style'])){
                $input['style'] = new HtAttrStyle($input['style']);
            }
        }
        parent::exchangeArray($input);
    }

    function offsetGet($index)
    {
        if($index=='style'){
            if(!isset($this['style'])){
                $this['style'] = new HtAttrStyle();
            }
        }
        return parent::offsetGet($index);
    }

    function offsetSet($index, $value)
    {
        if($index=='style'){
            if(is_array($value)){
                $value = new HtAttrStyle($value);
            }
        }
        return parent::offsetSet($index, $value);
    }

    function __toString()
    {
        $attrs = [];
        foreach($this as $k => $v){
            $attrs[] = $k.'="'.htmlspecialchars($v,ENT_QUOTES).'"';
        }
        return implode(' ',$attrs);
    }

}