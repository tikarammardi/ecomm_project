<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>
    <!-- Page Content -->
   

        

          
          
            
                    <!-- Slider -->
                    <?php include(TEMPLATE_FRONT . DS . "slider.php")?>

            <div class="container">
            <div class="row">
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php")?> 
               <?php get_products(); ?>
           
        </div>
         </div>

              

               
   

  <?php include(TEMPLATE_FRONT . DS . "footer.php")?>