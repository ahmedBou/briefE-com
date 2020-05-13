<?php 
require_once("../ressources/config.php");
?>

<?php include("../ressources/front/header.php")?>
<!-- <?php include(TEMPLATE_FRONT . "header.php")?> -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <!-- sidebar -->
        <?php include("../ressources/front/side_nav.php")?>


            <div class="col-md-9">

            <?php include("../ressources/front/slider.php")?>

                <div class="row">

                   

                    <?php get_products(); ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Chri Mghamad</a>
                    
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <?php include("../ressources/front/footer.php")?>
