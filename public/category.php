<?php require_once("../ressources/config.php");?>

<!-- <?php include("../ressources/front/header.php")?> -->
<?php include(TEMPLATE_FRONT . DS . "header.php");?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- <?php include("../ressources/front/top-nav.php")?> -->
    <?php include(TEMPLATE_FRONT . DS . "top-nav.php");?>
        
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">

            <h1>Product</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <?php get_products_in_cat_page() ?>

        <div class="row text-center">

        </div>

            

        <!-- /.row -->

        <hr>


    <!-- <?php include("../ressources/front/footer.php")?> -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>

    </div>