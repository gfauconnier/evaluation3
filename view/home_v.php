<?php
require "template/head.php";
require "template/header.php";
?>
<ul>
<?php
foreach($books as $book){
    echo "<li>".$book->getTitle()."</li>";
}
?>
</ul>