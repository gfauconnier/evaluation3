<?php 
require_once '../model/data.php';
require_once '../services/services.php';

// $category = "Policier";
$category="";
if(isset($_GET['category']) && $_GET['category'] != "All") {
    $category = $_GET['category'];
}

$books = $book_manager->getAllBooks($category);
require '../view/home_v.php';