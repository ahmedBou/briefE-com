<?php 
require_once("../ressources/config.php");
?>

<?php include(TEMPLATE_FRONT . DS . "header.php");?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <!-- sidebar -->

        <?php include(TEMPLATE_FRONT . DS . "side_nav.php");?>


            <div class="col-md-9">

            <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>

                <div class="row">
                <!-- <?php echo $_SESSION["product_1"]; ?>
                    -->

                    <?php get_products(); ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this Product?</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum incidunt neque blanditiis eum velit accusantium a ea. Fugit natus quis non, rem adipisci est, sunt culpa animi, eius ullam accusamus.</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Chri Mghamad</a>
                    
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">


        <?php include(TEMPLATE_FRONT . DS . "footer.php");?> 
