<?php

class BookManager
{
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
    public function addBook(Book $book)
    {
        try {
            $this->_db->beginTransaction();

            $query = $this->_db->prepare('INSERT INTO books (title, author, release_date, category, summary) 
            VALUES (:title, :author, :release_date, :category, :summary)');

            $query->bindValue(':title', $book->getTitle(), PDO::PARAM_INT);
            $query->bindValue(':author', $book->getAuthor(), PDO::PARAM_STR);
            $query->bindValue(':release_date', $book->getRelease_date(), PDO::PARAM_INT);
            $query->bindValue(':category', $book->getCategory(), PDO::PARAM_STR);
            $query->bindValue(':summary', $book->getSummary(), PDO::PARAM_STR);
            $query->execute();

            $this->_db->commit();

            return 'New book added';
        } catch (Exception $e) {
            $this->_db->rollback();
            return 'Error while trying to create book';
        }
    }

    // gets the book depending on sent id
    public function getBook(Book $book)
    {
        if ($this->bookExists($book)) {
            $query = $this->_db->query("SELECT * FROM books WHERE id_book = ".$book->getId_book());
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $book->hydrate($data);
            return $book;
        }
        return false;
    }

    // gets all books
    public function getAllBooks($category)
    {
        $cat_sort = "";
        if ($category != "") {
            $cat_sort = " WHERE category = '".$category."'";
        }
        $query = $this->_db->query("SELECT * FROM books".$cat_sort);
        $books = $query->fetchAll(PDO::FETCH_ASSOC);
        // creates a new Book per query answer
        foreach ($books as $key => $book) {
            $books[$key] = new Book($book);
        }
        return $books;
    }

    // checks if the book exists
    public function bookExists(Book $book)
    {
        $query = $this->_db->query("SELECT * FROM books WHERE id_book = ".$book->getId_book());
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
