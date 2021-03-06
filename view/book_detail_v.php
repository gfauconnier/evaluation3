<?php
require "template/head.php";
require "template/header.php";

if(isset($message)) {
    echo $message;
} elseif (!isset($message) AND (isset($_POST['rent']) OR isset($_POST['return']))) {
    echo "An error occured, the operation wasn't executed";
}
?>
<div class="container row">
    <div class="col-12 col-md-6">
        <table class="col-10 col-md-6">
            <tfoot>
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
            </tfoot>
        </table>

    

<?php

    if ($book->getDisponibility()==1) {
    ?>
        <form action="" method="post" class="col-12">
            <fieldset>
                <legend>Rent book :</legend>
                <label for="">User</label>
                <input type="text" name="user_ident">
                <input type="submit" name="rent" value="Rent" class="btn btn-primary">
            </fieldset>
        </form>
    <?php
    } else {
        ?>
        <form action="" method="post" class="col-12">
            <fieldset>
                <legend>Return book :</legend>
                <input type="submit" name="return" value="Return" class="btn btn-primary">
            </fieldset>
        </form>
    <?php
    }
?>  </div>
    <table id="bookrenters" class="col-12 col-md-6">
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
            <tr class="users" id="<?php echo $book_renter->getId_user(); ?>" title="Show user details">
                <td class="col-3"><?php echo $book_renter->getUser_ident(); ?>&nbsp;<a href="user_detail.php?id_user=<?php echo $book_renter->getId_user(); ?>"><i class="material-icons">search</i></a></td>
                <td class="col-3"><?php echo date("d-m-Y", strtotime($book_renter->getRent_date())); ?></td>
                <td class="col-3"><?php echo $book_renter->getReturn_date() ? date("d-m-Y", strtotime($book_renter->getReturn_date())) : "Still rented"; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    
</div>
<?php
require 'template/footer.php';
