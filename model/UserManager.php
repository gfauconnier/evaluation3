<?php

class UserManager {
    private $_db;
    
    // constructor just calls connection to database
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
     //SETTER
    private function setDb(PDO $db)
    {
        $this->_db = $db;
    }
     // METHODS
}