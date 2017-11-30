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
    public function addUser(User $user) {
        try {
            $this->_db->beginTransaction();

            $query = $this->_db->prepare('INSERT INTO users (user_fname, user_lname, user_ident) 
            VALUES (:user_fname, :user_lname, :user_ident)');

            $query->bindValue(':user_fname', $user->getUser_fname(), PDO::PARAM_STR);
            $query->bindValue(':user_lname', $user->getUser_lname(), PDO::PARAM_STR);
            $query->bindValue(':user_ident', $user->getUser_ident(), PDO::PARAM_STR);
            $query->execute();

            $this->_db->commit();

            return 'New user added';
        } catch (Exception $e) {
            $this->_db->rollback();
            return 'Error while trying to create user';
        }
    }

    // gets the user depending on sent id
    public function getUser(User $user)
    {
        // id_user = ".$user->getId_user()." OR
        if ($this->userExists($user)) {
            $query = $this->_db->query("SELECT * FROM users WHERE id_user = '".$user->getId_user()."' OR user_ident = '".$user->getUser_ident()."'");
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $user->hydrate($data);
            return $user;
        }
        return false;
    }

    // gets all users
    public function getAllUsers()
    {
        
        $query = $this->_db->query("SELECT * FROM users");
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        // creates a new user per query answer
        foreach ($users as $key => $user) {
            $users[$key] = new User($user);
        }
        return $users;
    }

    // checks if the user exists
    public function userExists(User $user)
    {
        $query = $this->_db->query("SELECT * FROM users WHERE id_user = '".$user->getId_user()."' OR user_ident = '".$user->getUser_ident()."'");
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}