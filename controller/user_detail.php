<?php 
require_once '../model/data.php';
require_once '../services/services.php';


if (isset($_GET['id_user'])) {
    $user = new User($_GET);
    if ($user_manager->getuser($user)) {

        $user = $user_manager->getUser($user);
        $rented_books = $history_manager->getRentedBooks($user);

        require '../view/user_detail_v.php';
    } else {
        header('Location: home.php');
    }
} else {
    header('Location: home.php');
}
