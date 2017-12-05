<?php

class RentedBooks extends History {
    protected $title;


    /**
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed title
     *
     */
    public function setTitle($title)
    {
        if(strlen($title) <= 50 && strlen($title) > 0 && preg_match('#^[a-zA-Z0-9- ]*$#', $title)) {
            $this->title = $title;
          }
    }  
}