<?php

if ($book->getDisponibility()==1) {
    ?>
    <form action="" method="post">
        <label for="">User</label>
        <input type="text" name="user_ident">
        <input type="submit" name="rent">
    </form>
    <?php
} else {
        ?>
    <form action="" method="post">
        <input type="submit" name="return">
    </form>
    <?php
}

