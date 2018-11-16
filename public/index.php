<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>


<?php include(TEMPLATE_FRONT . DS . "slider.php")?>
<?php 
       if(isset($_SESSION['name'])) {
              display_message();
       }
?>

<div class="container">
       <div class="row">
              
              <div class="  ">
                     <h2>Featured Products</h2>
              </div>
              <?php get_products(); ?>

       </div>
</div>






<?php include(TEMPLATE_FRONT . DS . "footer.php")?>