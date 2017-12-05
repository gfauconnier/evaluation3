<?php
require "template/head.php";
require "template/header.php";

if(isset($message)) {
    echo $message;
} elseif (!isset($message) AND (isset($_POST['rent']) OR isset($_POST['return']))) {
    echo "An error occured, the operation wasn't executed";
}

?>
<table>
<tr>
    <td>Title</td>
    <td><?php echo $book->getTitle(); ?></td>
</tr>
<tr>
    <td>Author</td>
    <td><?php echo $book->getAuthor(); ?></td>
</tr>
<tr>
    <td>Category</td>
    <td><?php echo $book->getCategory(); ?></td>
</tr>
<tr>
    <td>Summary</td>
    <td><?php echo $book->getSummary(); ?></td>
</tr>
</table>
<?php

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
?>
<table>
<thead>
    <tr>
        <th>User Number</th>
        <th>Rent Date</th>
        <th>Return Date</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($book_renters as $book_renter) {
    ?>
    <tr>
        <td class="col-3"><?php echo $book_renter->getUser_ident(); ?></td>
        <td class="col-3"><?php echo $book_renter->getRent_date(); ?></td>
        <td class="col-3"><?php echo $book_renter->getReturn_date(); ?></td>
    </tr>
    <?php
}
?>
</tbody>
</table>
<?php
require 'template/footer.php';
