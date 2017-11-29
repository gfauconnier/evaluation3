<?php 
require_once '../model/data.php';
require_once '../services/services.php';

// new book form treatment
if(isset($_POST['newbook'], $_POST['title'], $_POST['author'], $_POST['release_date'], $_POST['category'])
&& !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['release_date']) && !empty($_POST['category'])) {
    foreach ($_POST as $key => $value) {
        $book_data[$key] = sanitizeStr($value);
    }
    $new_book = new Book($book_data);
    $message = $book_manager->addBook($new_book);
}

// display of all books depending on category selected
$category="";
if(isset($_GET['category']) && $_GET['category'] != "All") {
    $category = $_GET['category'];
}

$books = $book_manager->getAllBooks($category);

//new user form treatment
if(isset($_POST['newuser'], $_POST['user_fname'], $_POST['user_lname'], $_POST['user_ident'])
&& !empty($_POST['user_fname']) && !empty($_POST['user_lname']) && !empty($_POST['user_ident'])) {
    foreach ($_POST as $key => $value) {
        $user_data[$key] = sanitizeStr($value);
    }
    $new_user = new User($user_data);
    $message = $user_manager->adduser($new_user);
}

// display of all users
$users = $user_manager->getAllUsers();


require '../view/home_v.php';