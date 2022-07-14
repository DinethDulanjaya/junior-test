<?php

interface QueryInterface 
{
    public function addQuery($sku, $name, $price, $type, $attribute);
    public function showQuery();
    public function deleteQuery($sku);
    public function singleQuery($sku);
}