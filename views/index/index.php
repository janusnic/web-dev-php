<?php
include (ROOT . '/views/parts/header.php');
?>
<main>
        <ul id="gallery-items" class="container">
        </ul> <!-- gallery-items -->
        <?php treeview($categories);?>
    </main>

    
<?php
include (ROOT . '/views/parts/cart.php');
include (ROOT . '/views/parts/footer.php');
?>
