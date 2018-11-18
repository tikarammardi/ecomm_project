<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>

<!-- Page Content -->
<div class="container">

    <!-- Side Navigation -->

    <?php include(TEMPLATE_FRONT . DS . "side_nav.php")?>
    <?php
            $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) ." ");
            confirm($query);
            while($row = fetch_array($query)):
    ?>

                <div class="row">
                <div class="col s6 ">
                    <div class="card">
                    <div class="card-image">
                    
                    <img  src="..\resources\<?php echo display_image($row['product_image']); ?>" alt="img">
                    </div>

                            
                            <div class="card-title">
                            <h4><?php  echo  $row['product_title']; ?></h4>
                            </div>
                            </div>
                        </div>
                            <div class="col s6 ">
                            <div class="card">
                            <h4><?php  echo  $row['product_title']; ?></h4>
                            <h4 class="card-action">
                                <?php  echo  "&#8377; " .$row['product_price']; ?>
                                <a href="../resources/cart.php?add=<?php echo  $row['product_id']; ?> " class="btn ">
                                    Add to Cart <i class="material-icons right">shopping_cart</i> </a>
                            </h4>
                            <p><?php echo $row['product_description']?></p> 
                            </div>
                           
                            
                            
                           
                </div>
                </div>
    
    




    <!-- <h3>Add A review</h3>

    <form action="" method="post">
        <div class="input-field">
            <input id="name" type="text">
            <label for="name">Name</label>
        </div>

        
        <div class="input-field">
            <input disabled placeholder="Email" id="email" type="email" value="john@gmail.com">
            <label for="email">Email</label>
        </div>

      
        <div class="input-field">
            <textarea placeholder="Message" id="message" class="materialize-textarea"></textarea>
            <label for="message">Message</label>
        </div>

        <br>
        <br>
        <div class="input-field">
            <input type="submit" class="btn btn-primary" value="SUBMIT">
        </div>
    </form> -->

</div>



<hr>


<!--Row for Tab Panel-->

















<!--Row for Tab Panel-->


<?php endwhile ?>

</div> <!-- col-md-9 ends here-->

</div>
<!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php")?>