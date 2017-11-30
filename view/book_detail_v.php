<?php

if(isset($message)) {
    echo $message;
} elseif (!isset($message) AND (isset($_POST['rent']) OR isset($_POST['return']))) {
    echo "An error occured, the operation wasn't executed";
}

echo "<pre>";
var_dump($book);
echo "</pre>";

if ($book->getDisponibility()==1) {
    ?>
    <form action="" method="post">
        <label for="">User</label>
        <input type="text" name="user_ident">
        <input type="submit" name="rent" value="Rent">
    </form>
    <?php
} else {
        ?>
    <form action="" method="post">
        <input type="submit" name="return" value="Return">
    </form>
    <?php
}

echo "<pre>";
var_dump($book_renters);
echo "</pre>";

