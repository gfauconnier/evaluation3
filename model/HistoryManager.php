<?php

class HistoryManager
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

    // called when a new rental
    public function rentBook(History $history)
    {
        try {
            $this->_db->beginTransaction();

            $hist_query = $this->_db->prepare('INSERT INTO history (id_book, id_user, rent_date) 
            VALUES (:id_book, :id_user, NOW())');

            $hist_query->bindValue(':id_book', $history->getId_book(), PDO::PARAM_INT);
            $hist_query->bindValue(':id_user', $history->getId_user(), PDO::PARAM_INT);
            $hist_query->execute();

            $book_query = $this->_db->prepare('UPDATE books SET disponibility = 0 WHERE id_book = :id');
            $book_query->bindValue(':id', $history->getId_book(), PDO::PARAM_INT);
            $book_query->execute();

            $this->_db->commit();

            return 'Book rented';
        } catch (Exception $e) {
            $this->_db->rollback();
            return 'Error while trying to rent book';
        }
    }

    // updates tables when a book is returned
    public function returnBook(History $history)
    {
        try {
            $this->_db->beginTransaction();

            $hist_query = $this->_db->prepare('UPDATE history SET return_date = NOW()');
            $hist_query->execute();

            $book_query = $this->_db->prepare('UPDATE books SET disponibility = 1 WHERE id_book = :id');
            $book_query->bindValue(':id', $history->getId_book(), PDO::PARAM_INT);
            $book_query->execute();

            $this->_db->commit();

            return 'Book returned';
        } catch (Exception $e) {
            $this->_db->rollback();
            return 'Error while trying to return book';
        }
    }

    // gets users who rented the sent book
    public function getBookRenters(Book $book) {
        $query = $this->_db->query("SELECT history.rent_date, history.return_date, users.user_ident 
        FROM history INNER JOIN users 
        WHERE history.id_book = '".$book->getId_book()."' AND history.id_user = users.id_user 
        ORDER BY history.id_history DESC LIMIT 10");
        $book_renters = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($book_renters as $key => $book_renter) {
            $book_renters[$key] = new BookRenters($book_renter);
        }
        return $book_renters;
    }


    // gets all books rented by the user
    public function getRentedBooks(User $user) {
        $query = $this->_db->query("SELECT history.rent_date, history.return_date, books.title 
        FROM history INNER JOIN books 
        WHERE history.id_user = '".$user->getId_user()."' AND history.id_book = books.id_book 
        ORDER BY history.id_history DESC LIMIT 10");
        $rented_books = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rented_books as $key => $rented_book) {
            $rented_books[$key] = new RentedBooks($rented_book);
        }
        return $rented_books;
    }
}
