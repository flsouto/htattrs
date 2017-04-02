<?php

namespace FlSouto;


class HtAttrs extends \ArrayObject{

    function __construct($input=[], $flags = 0, $iterator_class="ArrayIterator"){
        parent::__construct([], $flags, $iterator_class);
        if(!empty($input)){
            $this->exchangeArray($input);
        }
    }

    function merge(array $attrs){

        $store = $this;
        foreach($attrs as $k=>$v){
            if(is_array($v)){
                foreach($v as $k2=>$v2){
                    $store[$k][$k2] = $v2;
                }
            } else {
                $store[$k] = $v;
            }
        }

        return $this;

    }

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