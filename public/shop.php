
<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
           <h1>Shop</h1>
            
        </header>

        <hr>

        <!-- Title -->
             
            
           
                <h3>Latest Features</h3>
        
        
        <!-- /.row -->

        <!-- Page Features -->
       
        <div class="row ">
        <?php get_products_in_shop_page(); ?>
            

</div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>