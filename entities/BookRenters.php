<?php

class BookRenters extends History {
    protected $user_ident;

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