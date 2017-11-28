<?php

class History {
    use Hydrate;

    private $id_history;
    private $id_book;
    private $id_user;
    private $rent_date;
    private $return_date;

    public function __construct($data) {
        $this->hydrate($data);
    }

    /**
     * Get the value of Id History
     *
     * @return mixed
     */
    public function getId_history()
    {
        return $this->id_history;
    }

    /**
     * Set the value of Id History
     *
     * @param mixed id_history
     *
     */
    public function setId_history($id_history)
    {
        $id_history = (int) $id_history;
        if (is_int($id_history) && $id_history > 0) {
          $this->id_history = $id_history;
        }
    }    
    
    /**
     * Get the value of Id Book
     *
     * @return mixed
     */
    public function getId_book()
    {
        return $this->id_book;
    }

    /**
     * Set the value of Id Book
     *
     * @param mixed id_book
     *
     */
    public function setId_book($id_book)
    {
        $id_book = (int) $id_book;
        if (is_int($id_book) && $id_book > 0) {
          $this->id_book = $id_book;
        }
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
     * Get the value of Rent Date
     *
     * @return mixed
     */
    public function getRent_date()
    {
        return $this->rent_date;
    }

    /**
     * Set the value of Rent Date
     *
     * @param mixed rent_date
     *
     */
    public function setRent_date($rent_date)
    {
        $this->rent_date = $rent_date;
    }    
    
    /**
     * Get the value of Return Date
     *
     * @return mixed
     */
    public function getReturn_date()
    {
        return $this->return_date;
    }

    /**
     * Set the value of Return Date
     *
     * @param mixed return_date
     *
     */
    public function setReturn_date($return_date)
    {
        $this->return_date = $return_date;
    }
}
