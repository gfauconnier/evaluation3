<?php

class User {
    use Hydrate;

    private $id_user;
    private $user_fname;
    private $user_lname;
    private $user_ident;

    public function __construct($data) {
        $this->hydrate($data);
    }

    /**
     * Get the value of Id User
     *
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of Id User
     *
     * @param mixed id_user
     *
     */
    public function setId_user($id_user)
    {
        $id_user = (int) $id_user;
        if (is_int($id_user) && $id_user > 0) {
          $this->id_user = $id_user;
        }
    }    
    
    /**
     * Get the value of User Fname
     *
     * @return mixed
     */
    public function getUser_fname()
    {
        return $this->user_fname;
    }

    /**
     * Set the value of User Fname
     *
     * @param mixed user_fname
     *
     */
    public function setUser_fname($user_fname)
    {
        if(strlen($user_fname) <= 50 && strlen($user_fname) > 0 && preg_match('#^[a-zA-Z-]*$#', $user_fname)) {
            $this->user_fname = $user_fname;
          }
    }    
    
    /**
     * Get the value of User Lname
     *
     * @return mixed
     */
    public function getUser_lname()
    {
        return $this->user_lname;
    }

    /**
     * Set the value of User Lname
     *
     * @param mixed user_lname
     *
     */
    public function setUser_lname($user_lname)
    {
        if(strlen($user_lname) <= 50 && strlen($user_lname) > 0 && preg_match('#^[a-zA-Z-]*$#', $user_lname)) {
            $this->user_lname = $user_lname;
          }
    }    
    
    /**
     * Get the value of User Ident
     *
     * @return mixed
     */
    public function getUser_ident()
    {
        return $this->user_ident;
    }

    /**
     * Set the value of User Ident
     *
     * @param mixed user_ident
     *
     */
    public function setUser_ident($user_ident)
    {
        if(strlen($user_ident) <= 10 && strlen($user_ident) > 0 && preg_match('#^[a-zA-Z0-9]*$#', $user_ident)) {
            $this->user_ident = $user_ident;
          }
    }
}
