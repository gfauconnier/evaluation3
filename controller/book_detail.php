<?php 
require_once '../model/data.php';
require_once '../services/services.php';


if (isset($_GET['id_book'])) {
    $book = new Book($_GET['id_book']);

    if (isset($_POST['rent'])) {
        $user = new User($_POST);
        $user = $user_manager->getUser($user);
        if ($user) {
            $history_data['id_book'] = $book->getId_book();
            $history_data['id_user'] = $user->getId_user();
            $history = new History($history_data);
            $message = $history_manager->rentBook($history);
        }
    }

    if (isset($_POST['return'])) {
        $history_data['id_book'] = $book->getId_book();
        $history = new History($history_data);
        $message = $history_manager->returnBook($history);
    }

    $book = $book_manager->getBook($book);
    echo "<pre>";
    var_dump($book);
    echo "</pre>";

    require '../view/book_detail_v.php';
} else {
    header('Location: home.php');
}
