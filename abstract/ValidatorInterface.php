<?php

interface validate
{
    public function validateSku($sku);
    public function validateName($name);
    public function validatePrice($price);
    public function validateAttribute($value);
    public function validateMain($sku, $name, $price, $type);
    public function validateDisk($sku, $name, $price, $type, $size);
    public function validateFurniture($sku, $name, $price, $type, $length, $widht, $height);
    public function validateBook($sku, $name, $price, $type, $weight);
}