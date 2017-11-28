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
    public function getIdHistory()
    {
        return $this->id_history;
    }

    /**
     * Set the value of Id History
     *
     * @param mixed id_history
     *
     */
    public function setIdHistory($id_history)
    {
        $this->id_history = $id_history;
    }    
    
    /**
     * Get the value of Id Book
     *
     * @return mixed
     */
    public function getIdBook()
    {
        return $this->id_book;
    }

    /**
     * Set the value of Id Book
     *
     * @param mixed id_book
     *
     */
    public function setIdBook($id_book)
    {
        $this->id_book = $id_book;
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
     * Get the value of Rent Date
     *
     * @return mixed
     */
    public function getRentDate()
    {
        return $this->rent_date;
    }

    /**
     * Set the value of Rent Date
     *
     * @param mixed rent_date
     *
     */
    public function setRentDate($rent_date)
    {
        $this->rent_date = $rent_date;
    }    
    
    /**
     * Get the value of Return Date
     *
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->return_date;
    }

    /**
     * Set the value of Return Date
     *
     * @param mixed return_date
     *
     */
    public function setReturnDate($return_date)
    {
        $this->return_date = $return_date;
    }
}
