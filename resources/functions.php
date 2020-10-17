<?php

//global var
$uploads_dir = "uploads";


//helper functions

function last_id() {
    global $connection;

    return mysqli_insert_id($connection);
}

function set_message($msg) {
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;

    }else {
        $msg = "";
    }
}

function display_message() {
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location) {
    header("Location: $location");
}

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($result) {
    global $connection;

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string) {
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {

    return mysqli_fetch_array($result);
}

//*********************************FRONT END FUNCTIONS*************************************** */
//get products

function get_products() {
    $query = query("SELECT * FROM products");
    confirm($query);
    //heredoc
    while($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
       $product = <<<DELIMETER
       <div class="col s10 m6 l3 ">
       <div class="card">
            <a class="card-image" href="item.php?id={$row['product_id']}" ><img src="../resources/{$product_image}" alt="image is here"> </a>
            <h4 class="card-title flow-text center-align"><a class="black-text"  href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <h4 class="flow-text center-align">&#8377;{$row['product_price']}</h4>
                <div class="card-action">
                <a class="btn waves-effect waves-light" target="_parent" href="../resources/cart.php?add={$row['product_id']}">Add to Cart <i class="material-icons right">shopping_cart</i></a>
            </div>
        </div>
    </div>
DELIMETER;

echo $product;
    }
}

//get categories
function get_categories() {
    $query = query("SELECT * FROM categories");
    
    confirm($query);

    while($row = fetch_array($query)) {
        
        $category_links = <<<DELIMETER
             

   

           
        <a class="btn waves-effect" href="category.php?id={$row['cat_id']}" class=" ">{$row['cat_title']}</a>
    


DELIMETER;
        
        echo $category_links;

    }
}


// category

function get_products_in_cat_page() {
    $query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        $product_category = <<<DELIMETER
        <div class="col s10 m6 l2">
        <div class="card">
        <a class="card-image" href="item.php?id={$row['product_id']}" ><img src="../resources/{$product_image}" alt="img"> </a>
        <h4 class="card-title flow-text center-align"><a class="black-text"  href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
        <h4 class="flow-text center-align">&#8377; {$row['product_price']}</h4>
        <div class="card-action">
       <a class="btn waves-effect waves-light" target="_parent" href="../resources/cart.php?add={$row['product_id']}">Add to Cart <i class="material-icons right">shopping_cart</i></a>
        </div>
    
    </div>
    </div>
DELIMETER;
 
 echo $product_category;
     }
}



function get_products_in_shop_page() {
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        $product_category = <<<DELIMETER
        <div class="col s10 m6 l2 ">
        <div class="card">
            <a class="card-image" href="item.php?id={$row['product_id']}" ><img src="../resources/{$product_image}" alt="img"> </a>
            <h4 class="card-title flow-text center-align"><a class="black-text"  href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
            <h4 class="flow-text center-align">&#8377; {$row['product_price']}</h4>
            <div class="card-action">
           <a class="btn waves-effect waves-light" target="_parent" href="../resources/cart.php?add={$row['product_id']}">Add to Cart <i class="material-icons right">shopping_cart</i></a>
            </div>
        
        </div>
    </div>
DELIMETER;
 
 echo $product_category;
     }
}


function login_user() {
    if(isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

    $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
    confirm($query);

    if(mysqli_num_rows($query) == 0) {
        set_message("Username or password incorrect!");
        redirect("login.php");
    }else {
        $_SESSION['username'] = $username;
        set_message("Welcome {$username}");
        redirect("admin");
    
    }
}
}

function send_message() {


    if(isset($_POST['submit'])) {
        
        $to     = "tikarammardi@hotmail.com";
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $header = "From: {$form_name} {$email}";

        $result = mail($to,$subject,$message,$header); 

        if(!$result) {
            set_message("Sorry we could not send your message");
            redirect("contact.php");
        }else {
            set_message("Message SEnt");
        }
    }
}

//*********************************BACKEND END FUNCTIONS*************************************** */
function display_orders() {
    $query = query("SELECT * FROM orders");
    confirm($query);

    while($row = fetch_array($query)) {

    $orders = <<<DELIMETER
    <tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    <td><a class = "btn red" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}" > Remove</a></td>
    </tr>
DELIMETER;

echo $orders;
}

}



//////////////******ADMIN PRODUCTS page */

function display_image($image) {

global $uploads_dir;
    return $uploads_dir . DS . $image ;
}


function get_products_in_admin() {

    

$query = query("SELECT * FROM products");
confirm($query);
//heredoc
while($row = fetch_array($query)) {

    $category = show_product_category_title($row['product_category_id']);
    $product_image = display_image($row['product_image']);
$product =<<<DELIMETER
                <tr>
                    <td>{$row['product_id']}</td>
                    <td>{$row['product_title']} <br>
                    <a href="index.php?edit_product&id={$row['product_id']}"><img  width = "100" src="../../resources/{$product_image}" alt="image is here"></a>
                    </td>
                    <td>{$category}</td>
                    <td>{$row['product_price']}</td>
                    <td>{$row['product_quantity']}</td>
                    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}" > Remove</a></td>
                </tr>
DELIMETER;
    echo $product;
    }
}
/*************************************************** */

function show_product_category_title($product_category_id) {
$category_query = query("SELECT * FROM categories WHERE cat_id = {$product_category_id}");
confirm($category_query);

while($category_row = fetch_array($category_query)) {

    return $category_row['cat_title'];
}
}

/**********************************adding products through admin 8888888888************************* */


function add_product() {

    if(isset($_POST['publish'])) {

        
    
       $product_title           = escape_string($_POST['product_title']);
       $product_category_id     = escape_string($_POST['product_category_id']);
       $product_price           = escape_string($_POST['product_price']);
       $product_quantity        = escape_string($_POST['product_quantity']);
       $product_description     = escape_string($_POST['product_description']);
       $short_desc              = escape_string($_POST['short_desc']);
       $product_image           = escape_string($_FILES['file']['name']);
       $image_temp_location     = escape_string($_FILES['file']['tmp_name']);

       move_uploaded_file($image_temp_location, UPLOAD_DIR . DS . $product_image);
        $last_id = last_id();
        $query = query("INSERT INTO products(product_title, product_category_id,  product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}',  '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
        confirm($query);
        set_message("New Product with id {$last_id} ADDed");

        redirect("index.php?products");

    }
}


//get categories
function show_categories_add_product() {
    $query = query("SELECT * FROM categories");
    
    confirm($query);

    while($row = fetch_array($query)) {
    
        $categories_options = <<<DELIMETER

        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
     
DELIMETER;
        
        echo $categories_options;

    }
}
//**********************************************888888*****Update functio************ */


function update_product() {

    if(isset($_POST['update'])) {

        
    
       $product_title           = escape_string($_POST['product_title']);
       $product_category_id     = escape_string($_POST['product_category_id']);
       $product_price           = escape_string($_POST['product_price']);
       $product_quantity        = escape_string($_POST['product_quantity']);
       $product_description     = escape_string($_POST['product_description']);
       $short_desc              = escape_string($_POST['short_desc']);
       $product_image           = escape_string($_FILES['file']['name']);
       $image_temp_location     = escape_string($_FILES['file']['tmp_name']);

       if(empty($product_image)) {
           $get_pic = query ("SELECT product_image FROM products WHERE product_id = " .escape_string($_GET['id']) . " ");
           confirm($get_pic);
           while($pic = fetch_array($get_pic)) {
                $product_image = $pic['product_image'];
           }
       }

       move_uploaded_file($image_temp_location, UPLOAD_DIR . DS . $product_image);
        
       $query = "UPDATE products SET ";
       $query .= "product_title         = '{$product_title}'        ,";
       $query .= "product_category_id   = '{$product_category_id}'  ,";
       $query .= "product_price         = '{$product_price}'        ,";
       $query .= "product_quantity      = '{$product_quantity}'     ,";
       $query .= "product_description   = '{$product_description}'  ,";
       $query .= "short_desc            = '{$short_desc}'           ,";
       $query .= "product_image         = '{$product_image}'         ";
       $query .= "WHERE product_id = " . escape_string($_GET['id']);
       

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("New Product has been updated");
         redirect("index.php?products");

    }
}


/*******************************Category in admin*********** */


function show_category_in_admin() {
   
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);

    while($row = fetch_array($category_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER
        <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td> <td><a class = "btn btn-danger " href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}" > Remove</a></td></td>
        </tr>
DELIMETER;

echo $category;
    }
}


function add_category() {
    
    if(isset($_POST['add_category'])) {
        
        $cat_title = escape_string($_POST['cat_title']);
        if(empty($cat_title) || $cat_title == " ") {
            echo "<p> CAnnot be empty </p>";
        }else {

        
        $insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
        confirm($insert_cat);
        set_message("Category created");
        
        }
    }
}



/**************************************Addubg users***************** */

function display_users() {
   
    $category_query = query("SELECT * FROM users");
    confirm($category_query);

    while($row = fetch_array($category_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];

        $user = <<<DELIMETER
        <tr>
            <td>{$user_id}</td>
            <td>{$username}</td>
            <td>{$email}</td>
            <td> <td><a class = "btn btn-danger " href="../../resources/templates/back/delete_user.php?id={$row['user_id']}" > Remove</a></td></td>
        </tr>
DELIMETER;

echo $user;
    }
}


function add_user() {
    if(isset($_POST['add_user'])) {

    $username  =   escape_string($_POST['username']);
    $email     =   escape_string($_POST['email']);
    $password  =   escape_string($_POST['password']);
    //$user_photo = escape_string($_FILES['file']['name']);
    //$photo_temp = escape_string($_FILES['file']['tmp_name']);

    //move_uploaded_file(photo_temp, UPLOAD_DIR . DS . $user_photo);

    $query = query("INSERT INTO users(username, email, password) VALUES('{$username}', '{$email}', '{$password}')");
    confirm($query);
    redirect("index.php?users");

    }
}


/****************get report */

function get_reports() {

    

    $query = query("SELECT * FROM reports");
    confirm($query);
    //heredoc
    while($row = fetch_array($query)) {
    
    $report =<<<DELIMETER
                    <tr>
                        <td>{$row['report_id']}</td>
                        <td>{$row['product_id']} <br>
                        <td>{$row['order_id']}</td>
                        <td>{$row['product_price']} <br>
                        <td>{$row['product_title']}</td>
                        <td>{$row['product_quantity']} <br>
                        <td>{$row['order_id']}</td>
                      
                        <td><a class = "btn red " href="../../resources/templates/back/delete_report.php?id={$row['report_id']}" > Remove</a></td>
                    </tr>
DELIMETER;
        echo $report;
        }
    }



    function customer_register() {
        
        if(isset($_POST['submit'])) {
            $name = escape_string($_POST['name']);
            $email = escape_string($_POST['email']);
            $password = escape_string($_POST['password']);
            $address = escape_string($_POST['address']);
            $state = escape_string($_POST['state']);
            $city = escape_string($_POST['city']);
            $zip = escape_string($_POST['zip']);
            $mobile = escape_string($_POST['mobile']);

            $query = query("INSERT INTO customers(name, email, password, address, state, city, zip, mobile) VALUES ('{$name}', '{$email}','{$password}', '{$address}', '{$state}', '{$city}', '{$zip}', '{$mobile}')");
            confirm($query);
            set_message("Congratulation {$name}! You have successfully registed.");

            
            redirect("index.php");

        }

       
    }

    function customer_login() {
        if(isset($_POST['submit'])) {
            $name = escape_string($_POST['name']);
            $password = escape_string($_POST['password']);
    
        $query = query("SELECT name,password FROM customers WHERE name = '{$name}' AND password = '{$password}' ");
        confirm($query);
    
        if(mysqli_num_rows($query) == 0) {
            set_message("Username or password incorrect!");
            redirect("customer_login.php");
        }else {
            $_SESSION['name'] = $name;
            
            redirect("index.php");
        
        }
    }
    }

?>