<?php
require "template/head.php";
require "template/header.php";
if (isset($message)) {
    echo $message;
}
?>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item col-12 col-md-6 col-lg-3">
          <a class="nav-link active" id="pills-books-tab" data-toggle="pill" href="#nav-books" role="tab" aria-controls="nav-books" aria-selected="true">View Books</a>
        </li>
        <li class="nav-item col-12 col-md-6 col-lg-3">
          <a class="nav-link" id="pills-renters-tab" data-toggle="pill" href="#nav-renters" role="tab" aria-controls="nav-renters" aria-selected="true">View Renters</a>
        </li>
</ul>
<div class="tab-content" id="nav-tabContent">

    
    <div class="tab-pane fade show active" id="nav-books" role="tabpanel" aria-labelledby="nav-books-tab">
    <button class="btn btn-primary header_btn newbook" type="button" data-toggle="collapse" data-target="#collapseNewBook" aria-expanded="false" aria-controls="collapseNewBook">
          New Book
    </button>
    <div class="container collapse" id="collapseNewBook">
        <form action="" method="post" class="row">
            <div class="col-12 col-md-5">
                <label for="title" class="col-12">Title : </label>
                <input type="text" id="title" name="title" class="col-12" required>
            </div>
            <div class="col-12 col-md-5">
                <label for="author" class="col-12">Author : </label>
                <input type="text" id="author" name="author" class="col-12" required>
            </div>
            <div class="col-12 col-md-5">
                <label for="release_year" class="col-12">Release year : </label>
                <input type="text" id="release_year" name="release_date" class="col-12" required>
            </div>
            <div class="col-12 col-md-5">
                <label for="category" class="col-12">Category : </label>
                <select name="category" id="category" class="col-12">
                    <option value="Adventure">Adventure</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>    
                    <option value="Romance">Romance</option>
                    <option value="Science-Fiction">Science-Fiction</option>
                </select>
            </div>
            <div class="col-12">
                <label for="summary" class="col-12">Summary : </label>
                <textarea name="summary" id="summary" rows="6" class="col-12 col-md-10"></textarea>
            </div>
            <input type="submit" name="newbook" value="Add book" class="btn btn-primary newbookbtn">
        </form>
    </div>

    <select name="select_cat" id="select_cat">
        <option value="0">Choose books to display</option>
        <option value="All">All books</option>
        <option value="Adventure">Adventure</option>
        <option value="Drama">Drama</option>
        <option value="Fantasy">Fantasy</option>    
        <option value="Romance">Romance</option>
        <option value="Science-Fiction">Science-Fiction</option>
    </select>

    <table id="book_table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Disponibility</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($books as $book) {
            ?>
            <tr class="books" id="<?php echo $book->getId_book(); ?>" title="Show book details">
                <td class="col-3"><?php echo $book->getTitle(); ?><a href="book_detail.php?id_book=<?php echo $book->getId_book(); ?>">&nbsp;<i class="material-icons">search</i></a></td>
                <td class="col-3"><?php echo $book->getAuthor(); ?></td>
                <td class="col-3"><?php echo $book->getCategory(); ?></td>
                <td class="col-3"><?php echo $book->getDisponibility()==1 ? '<i class="material-icons green">thumb_up</i>' : '<i class="material-icons red">thumb_down</i>'; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    </div>

    <div class="tab-pane fade" id="nav-renters" role="tabpanel" aria-labelledby="nav-renters-tab">
    <div class="tab-pane fade show active" id="nav-renters" role="tabpanel" aria-labelledby="nav-renterss-tab">
    <button class="btn btn-primary header_btn newuser" type="button" data-toggle="collapse" data-target="#collapseNewRenter" aria-expanded="false" aria-controls="collapseNewRenter">
          New Renter
    </button>
    <div class="container collapse" id="collapseNewRenter">
        <form action="" method="post">
            <label for="fname">First name : </label>
            <input type="text" id="fname" name="user_fname">
            <label for="lname">Last name : </label>
            <input type="text" id="lname" name="user_lname">
            <label for="ident">User number : </label>
            <input type="text" id="ident" name="user_ident">
            <input type="submit" name="newuser" value="Add user" class="btn btn-primary">
        </form>
    </div>
        <table id="user_table">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>User number</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                ?>
                <tr class="users" id="<?php echo $user->getId_user(); ?>" title="Show user details">
                    <td class="col-3"><?php echo $user->getUser_fname(); ?>&nbsp;<a href="user_detail.php?id_user=<?php echo $user->getId_user(); ?>"><i class="material-icons">search</i></a></td>
                    <td class="col-3"><?php echo $user->getUser_lname(); ?></td>
                    <td class="col-3"><?php echo $user->getUser_ident(); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    
    </div>
    </div>
</div>
<?php
require 'template/footer.php';
