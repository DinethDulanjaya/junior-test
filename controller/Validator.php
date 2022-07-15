<?php
include "abstract/ValidatorInterface.php";
include "controller/Query.php";

class Validator extends Query implements validate
{
    private $db;
    private $query;
    private $message;
    private $attribute;
    public function __construct()
    {
        $this->db = new Database();
        $this->query = new Query();
        $message = "";
    }
    public function validateSku($sku)
    {
        // Reference to already existing sku
        if ($this->query->singleQuery($sku))
        {
            return true;
        }
    }
    public function validateName($name)
    {
        if (!strlen($name) > 0)
        {
            return true;
        }
    }
    public function validatePrice($price)
    {
        if (!(filter_var($price, FILTER_VALIDATE_FLOAT) && (strlen($price) > 0) && floatval($price >= 0)))
        {
            return true;
        }
    }
    public function validateType($type)
    {
        if (!((strlen($type) > 0) && (($type === "DVD") || ($type === "Furniture") || ($type === "Book"))))
        {
            return true;
        }
    }
    public function validateAttribute($value)
    {
        if (is_numeric($value) && floatval($value >= 0) && (strlen($value) > 0))
        {
            return true;
        }

    }
    public function validateMain($sku, $name, $price, $type)
    {
        if ($this->validateSku($sku) || $this->validateName($sku))
        {
            $this->message .= "Invalid SKU or already exists<br>";
        }
        if ($this->validateName($name))
        {
            $this->message .= "Invalid Name <br>";
        }
        if ($this->validatePrice($price))
        {
            $this->message .= "Invalid Price <br>";
        }
        if ($this->validateType($type))
        {
            $this->message .= "Select Product Type <br>";
        }  
        if (!empty($this->message))
        {
            return $this->message = "Please submit required data <br>".$this->message;
        }
        else
        {
            return "";
        }
    }
    public function validateDisk($sku, $name, $price, $type, $size)
    {
        $this->message = $this->validateMain($sku, $name, $price, $type);
        if ($this->validateAttribute($size))
        {
            $this->attribute = (string)$size." MB";
        }
        else
        {
            $this->message .= "Invalid Size <br>";
        }
        if (!empty($this->message))
        {
            return $this->message;
        }
        else
        {
            if($this->query->addQuery($sku, $name, $price, $type, $this->attribute))
            {
                header("Location: index.php");
            }
            else
            {
                return $this->message;
            }
        }
    }
    public function validateFurniture($sku, $name, $price, $type, $length, $width, $height)
    {
        $this->message = $this->validateMain($sku, $name, $price, $type);
        if ($this->validateAttribute($length))
        {
            $this->attribute .= $length." x ";
        }
        else
        {
            $this->message .= "Invalid Length <br>";
        }
        if ($this->validateAttribute($width))
        {
            $this->attribute .= $width." x ";
        }
        else
        {
            $this->message .= "Invalid Width <br>";
        }
        if ($this->validateAttribute($height))
        {
            $this->attribute .= $height;
        }
        else
        {
            $this->message .= "Invalid Height <br>";
        }
        if (!empty($this->message))
        {
            return $this->message;
        }
        else
        {
            if($this->query->addQuery($sku, $name, $price, $type, $this->attribute))
            {
                header("Location: index.php");
            }
            else
            {
                return $this->message;
            }
        }
    }
    public function validateBook($sku, $name, $price, $type, $weight)
    {
        $this->message = $this->validateMain($sku, $name, $price, $type);
        if ($this->validateAttribute($weight))
        {
            $this->attribute = $weight."KG";
        }
        else
        {
            $this->message .= "Invalid Weight <br>";
        }
        if (!empty($this->message))
        {
            return $this->message;
        }
        else
        {
            if(($this->query->addQuery($sku, $name, $price, $type, $this->attribute)) && empty($this->message))
            {
                header("Location: index.php");
            }
            else
            {
                return $this->message;
            } 
        }
    }
}
