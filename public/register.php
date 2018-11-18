
<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php")?>

<?php 
customer_register(); 
add_user();
?>
<div class="container">



<!--   Tabs registration       -->

 <!-- TABS -->
 <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3">
            <a href="#tab1">Customer Registration</a>
          </li>
          <li class="tab col s3">
            <a href="#tab2">Admin Registration</a>
          </li>
         
        </ul>
      </div>
      <div id="tab1" class="col s12">
        <h3>Customer</h3>
        <div class="alert alert-danger"><?php display_message(); ?></div>
 

 <p>Please fill the form to register</p>
   <form method = "POST" action="register.php">
    <!-- TEXT FIELD -->
    <div class="input-field">
    <input id="name" name="name" type="text">
    <label for="name">Name</label>
   </div>
 
   <!-- VALIDATION & ERROR -->
   <div class="input-field">
   <input placeholder="Email" id="email"  name="email" type="email" class="validate">
   <label data-error="Invalid" data-success="Valid" for="email">Email</label>
   </div>
 
   <div class="input-field">
   <input placeholder="Password" id="password" name="password" type="password" class="validate">
   <label  for="password">Password</label>
   </div>
   
    <!-- TEXT FIELD -->
    <div class="input-field">
    <input id="address" name="address" type="text">
    <label for="address">Address</label>
   </div>
   <div class="input-field">
    <input id="state" name="state" type="text">
    <label for="state">State</label>
   </div>
   <div class="input-field">
    <input id="city" name="city" type="text">
    <label for="city">City</label>
   </div>
   <div class="input-field">
    <input id="zip" name="zip" type="text">
    <label for="zip">Zip</label>
   </div>
   <div class="input-field">
    <input id="mobile" name="mobile" type="text">
    <label for="mobile">Mobile</label>
   </div>
    
     
     <button type="submit" name="submit"  class="btn ">Sign up</button>
   </form>
   
 </div>
      </div>
      <div id="tab2" class="col s12">
        <h3>Admin</h3>
        <div class="alert alert-danger"><?php display_message(); ?></div>
 

 <p>Please fill the form to register</p>
   <form method = "POST" action="register.php">
    <!-- TEXT FIELD -->
    <div class="input-field">
    <input id="name" name="username" type="text">
    <label for="name">Name</label>
   </div>
 
   <!-- VALIDATION & ERROR -->
   <div class="input-field">
   <input placeholder="Email" id="email"  name="email" type="email" class="validate">
   <label data-error="Invalid" data-success="Valid" for="email">Email</label>
   </div>
 
   <div class="input-field">
   <input placeholder="Password" id="password" name="password" type="password" class="validate">
   <label  for="password">Password</label>
   </div>
   
   
     
     <button type="submit" name="add_user"  class="btn ">Sign up</button>
   </form>
   
 </div>
      </div>
     
    </div>


    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>