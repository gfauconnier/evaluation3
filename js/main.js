// changes the displayed categories on select change
$('#select_cat').change(function() {
    if (this.value != 0) {
        if ((this.value)!= "All") {
            window.location.href = 'home.php?category=' + $(this).val();
        }
        else {
            window.location.href = 'home.php';
        }
    }
  })