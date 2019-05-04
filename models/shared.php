<?php
class SharedModel extends Model {
    public function Index(){
        $this->query('SELECT COUNT(*) FROM groups');
        $rowsG = $this->count();
        $this->query('SELECT COUNT(*) FROM products');
        $rowsA = $this->count();
        $this->query('SELECT COUNT(*) FROM manufacturers');
        $rowsM = $this->count();
        $this->query('SELECT COUNT(*) FROM news');
        $rowsN = $this->count();
        $this->query('SELECT COUNT(*) FROM users');
        $rowsU = $this->count();
        $this->query('SELECT COUNT(*) FROM services');
        $rowsS = $this->count();
        $rows = array($rowsG, $rowsA, $rowsM, $rowsN, $rowsU, $rowsS);
        return $rows;
    }
}