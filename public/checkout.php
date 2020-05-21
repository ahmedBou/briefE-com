<?php require_once("../ressources/config.php");?>
<?php include(TEMPLATE_FRONT .DS. "header.php"); ?>
<?php require_once("cart.php");?>


<?php 
if(isset($_SESSION['product_1'])){
    echo $_SESSION['product_1'];
    // echo $_SESSION['item_total'];
}
?> 


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php include(TEMPLATE_FRONT . "/top-nav.php"); ?>
</nav>


<!-- Page Content -->
<div class="container">
<!-- /.row --> 
    <div class="row">
        <h4 class="text-center bg-danger"><?php echo display_message(); ?></h4>
        <h1>Panier</h1>
            <form action="">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php cart(); ?>
                    </tbody>
                </table>
            </form>

<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
    <h2>Total</h2>
        <table class="table table-bordered" cellspacing="0">
            <tbody>
                <tr class="cart-subtotal">
                    <th>Articles:</th>
                    <td><span class="amount">                        
                        <?php  
                            echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
                        ?></span></td>
                </tr>
                <tr class="shipping">
                    <th>Frais TVA</th>
                    <td>Livraison gratuite</td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">
                        <?php  
                            echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
                        ?>

            
                    </span></strong> </td>
                </tr>
            </tbody>
        </table>

</div><!-- CART TOTALS-->
 </div><!--Main Content-->
<?php include(TEMPLATE_FRONT . "/footer.php")?>