<?php 
require_once '../model/data.php';
require_once '../services/services.php';

$category = "Policier";
if(isset($_GET['category'])) {
    $category = $_GET['category'];
}

$books = $book_manager->getAllBooks($category);
require '../view/home_v.php';