<?php
class model{
    protected $db;
    protected $id;
    
    public function __construct($id = NULL){
        global $db;
        $this->db = $db;
        $this->id = $id;
    }

    function sql($sql){
        return $this->db->query($sql);
    }

    
    
}