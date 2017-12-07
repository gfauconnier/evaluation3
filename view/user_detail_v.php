<?php
require "template/head.php";
require "template/header.php";

if(isset($message)) {
    echo $message;
}

 ?>

 <div class="container row renter_details">
    <table class="col-10 col-md-6 ">
        <tfoot>   
        <tr>
            <td>First name</td>
            <td><?php echo $user->getUser_fname(); ?></td>
        </tr>
        <tr>
            <td>Last name</td>
            <td><?php echo $user->getUser_lname(); ?></td>
        </tr>
        <tr>
            <td>User number</td>
            <td><?php echo $user->getUser_ident(); ?></td>
        </tr>
        </tfoot>
    </table>

    <div class="col-12 col-md-6">
        <table id="rentedbooks" class="col-12">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rented_books as $rented_book) {
                ?>
                <tr class="books" id="<?php echo $rented_book->getId_book(); ?>" title="Show book details">
                    <td class="col-3"><?php echo $rented_book->getTitle(); ?>&nbsp;<a href="book_detail.php?id_book=<?php echo $rented_book->getId_book(); ?>"><i class="material-icons">search</i></a></td>
                    <td class="col-3"><?php echo date("d-m-Y", strtotime($rented_book->getRent_date())); ?></td>
                    <td class="col-3"><?php echo date("d-m-Y", strtotime($rented_book->getReturn_date())); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
 
 
 </div>

<?php
require 'template/footer.php';