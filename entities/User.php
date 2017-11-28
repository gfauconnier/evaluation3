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
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of Id User
     *
     * @param mixed id_user
     *
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }    
    
    /**
     * Get the value of User Fname
     *
     * @return mixed
     */
    public function getUserFname()
    {
        return $this->user_fname;
    }

    /**
     * Set the value of User Fname
     *
     * @param mixed user_fname
     *
     */
    public function setUserFname($user_fname)
    {
        $this->user_fname = $user_fname;
    }    
    
    /**
     * Get the value of User Lname
     *
     * @return mixed
     */
    public function getUserLname()
    {
        return $this->user_lname;
    }

    /**
     * Set the value of User Lname
     *
     * @param mixed user_lname
     *
     */
    public function setUserLname($user_lname)
    {
        $this->user_lname = $user_lname;
    }    
    
    /**
     * Get the value of User Ident
     *
     * @return mixed
     */
    public function getUserIdent()
    {
        return $this->user_ident;
    }

    /**
     * Set the value of User Ident
     *
     * @param mixed user_ident
     *
     */
    public function setUserIdent($user_ident)
    {
        $this->user_ident = $user_ident;
    }
}
