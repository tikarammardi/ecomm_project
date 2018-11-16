<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">BAHA</a>
                <a class="button-collapse" data-activates="mobile-nav" href="#">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                        <a href="customer_login.php">Login</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                  
                    <li>
                        <a href="#!" class="dropdown-button" data-activates="my-dropdown"> 
                            <i class="material-icons">person</i> 
                        </a>
                        
                    </li>
                    <li><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></li>

                   
                    <li>
                        <a href="#!" class="dropdown-button" data-activates="my-dropdown2">SignIn 
                            
                        </a>
                        
                    </li>
                     
                    
                    <li>
                     <a href="register.php" class="btn waves-effect waves-light">Register</a>
                    </li>
                     <!--  DROPDOWN MENU -->
                     
                     <ul id="my-dropdown" class="dropdown-content">
                        
                            <li>
                                <a href="customer_logout.php">Log Out</a>
                            </li>
                        </ul>
                  

                    <ul id="my-dropdown2" class="dropdown-content">
                        <li>
                            <a href="login.php ">Admin</a>
                        </li>
                        <li>
                            <a href="customer_login.php ">Customer </a>
                        </li>
                    </ul>
                 
                    
                </ul>
                <ul class="side-nav" id="mobile-nav">
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                 </ul>  

            
        <!-- /.container -->
        </div>
        
    </div>