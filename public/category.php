
<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>
    <!-- Page Content -->
    <div class="container">

      

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

       
       
        <div class="row text-center">
            
        <?php get_products_in_cat_page(); ?>
            

        

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>