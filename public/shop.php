<?php require_once("../ressources/config.php");?>

<?php include(TEMPLATE_FRONT . DS . "header.php");?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <?php include(TEMPLATE_FRONT . DS . "top-nav.php");?>

</nav>


<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->

    <h1>Shop</h1>

    <!-- Page Features -->

    <div class="row text-center">
        <?php get_products_in_shop_page() ?>
    </div>

    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>


</div>