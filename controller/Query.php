<?php
include "abstract/QueryInterface.php";

class Query implements QueryInterface 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function addQuery($sku, $name, $price, $type, $attribute)
    {
        if (!empty($sku) && !empty($name) && !empty($price) && !empty($type) && !empty($attribute))
        {
            $this->db->query("INSERT INTO productitems(sku,name,price,type,attribute) VALUES(?,?,?,?,?)");
            $this->db->bind(1, $sku);
            $this->db->bind(2, $name);
            $this->db->bind(3, $price);
            $this->db->bind(4, $type);
            $this->db->bind(5, $attribute);
            if($this->db->execute()){
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }
    public function showQuery()
    {
        $this->db->query("SELECT * FROM productitems ORDER BY sku ASC");
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function deleteQuery($sku)
    {
        $this->db->query("DELETE FROM productitems WHERE sku=?");
        $this->db->bind(1, $sku);
        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function singleQuery($sku)
    {
        $this->db->query("SELECT * FROM productitems WHERE sku=?");
        $this->db->bind(1, $sku);
        $row = $this->db->single();
        if($this->db->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}