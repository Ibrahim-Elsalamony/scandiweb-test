<?php

class Validator
{
    private $db;
    private $table;
    private $val;

    public function __construct($db, $table = 'products', $val)
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
