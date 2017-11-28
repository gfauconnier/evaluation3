<?php

class Book {
  use Hydrate;

  private $id_book;
  private $title;
  private $author;
  private $release_date;
  private $category;
  private $description;
  private $disponibility;

  public function __construct($data) {
      $this->hydrate($data);
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
        $this->title = $title;
    }    
    
    /**
     * Get the value of Author
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of Author
     *
     * @param mixed author
     *
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get the value of Release Date
     *
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * Set the value of Release Date
     *
     * @param mixed release_date
     *
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }    
    
    /**
     * Get the value of Category
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of Category
     *
     * @param mixed category
     *
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }    
    
    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }    
    
    /**
     * Get the value of Disponibility
     *
     * @return mixed
     */
    public function getDisponibility()
    {
        return $this->disponibility;
    }

/**
 * Set the value of Disponibility
 *
 * @param mixed disponibility
 *
 */
public function setDisponibility($disponibility)
{
    $this->disponibility = $disponibility;
}
}
