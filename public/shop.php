<?php require_once("../ressources/config.php");?>

<?php include(TEMPLATE_FRONT . DS . "header.php");?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 
    <?php include(TEMPLATE_FRONT . DS . "top-nav.php");?>)
        
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
       
        <h1>Shop</h1>
        </header>

        <hr>

  

        <!-- Page Features -->
        <?php get_products_in_shop_page() ?>

        <div class="row text-center">

        </div>


    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>


    </div>