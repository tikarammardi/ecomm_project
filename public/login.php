<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
            <h2 class="text-center"><?php display_message(); ?></h2>
            <div class="col s6 offset-s3">         
            <form class="" action="" method="post" enctype="multipart/form-data">
            <?php login_user(); ?>
                <div class="input-field">
                
                    <input type="text" name="username" class="form-control"></label>
                    <label data-error="Invalid" data-success="Valid" for="username">Username</label>
                </div>
                 <div class="input-field">
                
                    <input type="text" name="password" class="form-control"></label>
                    <label  for="password">Password</label>
                </div>
                <p>No Account? <a href="/users/register">Register</a></p> 
               

                <button type="submit"  name="submit" class="btn">Sign In</button>
                  
                
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>