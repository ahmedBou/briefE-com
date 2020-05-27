<?php require_once("../ressources/config.php"); ?>
<?php require_once('../ressources/cart.php'); ?>
<?php include(TEMPLATE_BACK .DS. "/header.php"); ?>

<?php


if(isset($_GET['submit'])){
$amount = 'order_amount';
$product ='product_id';
$article = $_GET['order_item'];
$status = $_GET['order_status'];
}
?>




<div class="container">

    <h1 class="text-center">Thank You</h1>
</div>

<?php include(TEMPLATE_FRONT .DS. "footer.php");?>