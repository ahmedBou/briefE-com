<?php require_once("../ressources/config.php");?>
<?php include(TEMPLATE_FRONT .DS. "./header.php");?>


<?php
// add will have the id of our product, everytime is called it will will be concatenating with session and add one
// so we click on add we get these request and we're going to increment one everytime.
if(isset($_GET['add'])){
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . " ");
    confirm($query);
    while($row= fetch_array($query)){
        if($row['product_quantity'] != $_SESSION["product_".$_GET['add']] ){
            $_SESSION["product_".$_GET['add']] += 1;
            redirect("checkout.php");
        }else{
            set_message("We only have ".$row['product_quantity']." ". "{$row['product_title']}" . " available");
            redirect('checkout.php');
        }

    }


//     $_SESSION["product_".$_GET['add']] += 1;
//     redirect("index.php");
}
if(isset($_GET['remove'])){
    $_SESSION["product_".$_GET["remove"]]--;
    if($_SESSION["product_".$_GET["remove"]] <1){
        redirect('checkout.php');
    }else{
        redirect('checkout.php');
    }
}

if(isset($_GET['delete'])) {

    $_SESSION["product_".$_GET["delete"]]= '0';
    redirect('checkout.php');

}




?>
