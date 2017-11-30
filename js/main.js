// data tables
$(document).ready(function () {
    $('#book_table').DataTable();
    $('#user_table').DataTable();
});

// stacktable
$('#book_table').stacktable()
$('#user_table').stacktable()

// changes the displayed categories on select change
$('#select_cat').change(function () {
    if (this.value != 0) {
        if ((this.value) != "All") {
            window.location.href = 'home.php?category=' + $(this).val();
        } else {
            window.location.href = 'home.php';
        }
    }
})

// book table clickable tr
$('.books').click(function () {
    window.location.href = 'book_detail.php?id_book=' + this.id;
})

// user table clickable tr
$('.users').click(function () {
    window.location.href = 'user_detail.php?id_user=' + this.id;
})