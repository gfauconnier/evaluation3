<?php
require 'BookManager.php';
require 'UserManager.php';
require 'HistoryManager.php';
require 'dbconnect/dbconnect.php';
$book_manager = new BookManager($db);
$user_manager = new UserManager($db);
$history_manager = new HistoryManager($db);