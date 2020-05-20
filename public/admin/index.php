<?php require_once("../../ressources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>
<?php
if(!isset($_SESSION['username'])){
   redirect('../../public');
}?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->

                <!-- /.row -->
                <!-- <?php echo $_SERVER["REQUEST_URI"] ?><br>
                <?php echo $_SERVER["SERVER_NAME"] ?><br>
                <?php echo $_SERVER["HTTP_HOST"] ?><br>
                <?php echo $_SERVER["HTTP_REFERER"] ?><br>
                <?php echo $_SERVER["HTTP_USER_AGENT"] ?><br>
                <?php echo $_SERVER["SCRIPT_NAME"] ?><br>
                <?php echo __DIR__ ?> -->
                <?php 
                if($_SERVER["REQUEST_URI"] == "/briefE-com/public/admin/" || $_SERVER["REQUEST_URI"] == "/briefE-com/public/admin/index.php"){
                    include(TEMPLATE_BACK . "/admin_content.php");
                }                
                ?>

                <?php
                if(isset($_GET['orders'])){
                    include(TEMPLATE_BACK . "/orders.php");
                }
                ?>
                <?php
                    if(isset($_GET['add_product'])){
                        include(TEMPLATE_BACK . "/add_product.php");
                    }
                ?>
                <?php
                    if(isset($_GET['products'])){
                        include(TEMPLATE_BACK . "/products.php");
                    }
                ?>
                <?php
                    if(isset($_GET['categories'])){
                        include(TEMPLATE_BACK . "/categories.php");
                    }
                ?>
                <?php
                    if(isset($_GET['users'])){
                        include(TEMPLATE_BACK . "/users.php");
                    }
                ?>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include(TEMPLATE_BACK . "/footer.php"); ?>
