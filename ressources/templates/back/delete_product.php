<?php include("../../config.php")?>
<?php
if(isset($_GET['id'])){
    $query = query("DELETE FROM products WHERE product_id=". $_GET['id']." ");
    confirm($query);
    set_message('Product deleted');
    redirect("http://localhost/briefE-com/public/admin/index.php?products");
}

?>
