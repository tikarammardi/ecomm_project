
<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>
    
   
        <br>
      <?php include(TEMPLATE_FRONT . DS . "side_nav.php")?>
       
        <div class="row ">
       
      
        <h1 >Shop</h1>
        <h3 >Latest Features</h3>
      
       
      
        <div>
        
        
        <hr>
       <?php get_products_in_shop_page(); ?>
        </div>
      

      
            

</div>

        </div>
        <!-- /.row -->

   
    
    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>