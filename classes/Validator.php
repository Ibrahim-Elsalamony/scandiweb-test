<?php

class Validator
{
    private $db;
    private $table;
    private $val;

    // Move $val before $table in the constructor
    public function __construct($db, $val, $table = 'products')
    {
        $this->db = $db;
        $this->table = $table;
        $this->val = $val;
    }

    public function checkUniqueSKU($val)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE {$this->val} = ?");
        $stmt->execute([$val]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}
