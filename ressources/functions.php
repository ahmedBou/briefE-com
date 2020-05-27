<?php 
$upload_directory = "uploads";

function last_id(){
    global $connection;
    return mysqli_insert_id($connection);
}

// helper function
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        // will go when we refresh
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

// product function
function get_products(){
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)){
        // heredoc /DElIMETER
        $product = <<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img width=100 src="../ressources/uploads/{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h4 class="pull-right">{$row['product_price']} dh</h4>
                        <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum incidunt neque blanditiis eum velit.</p>
                        <a class="btn btn-primary" target="_blank" href="../ressources/cart.php?add={$row['product_id']}">Chri hani</a>
                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </div>
                </div>
            </div>
            DELIMETER;
        echo $product;
    }
}

function get_categories(){
    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row= fetch_array($query)){
        $category = <<<DELIMETER
        <a href="category.php?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>
        DELIMETER;
        echo $category;
    }
}

function get_products_in_cat_page(){
    $query = query("SELECT * FROM products WHERE product_category_id=". escape_string($_GET['id'])." ");
    confirm($query);
    while($row = fetch_array($query)){
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            DELIMETER;

        echo $product;
    }
}

function get_products_in_shop_page(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img src="../ressources/uploads/{$row['product_image']}"></a>
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../ressources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a><a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            DELIMETER;

        echo $product;
    }
}



// LOGIN
function login(){
    if(isset($_POST['submit'])){
        $username = escape_string($_POST['username']);
        // $email = $_POST['email'];
        $password = escape_string($_POST['password']);
        $query = query("SELECT * FROM users WHERE username = '{$username}'AND password = '{$password}'");
        confirm($query);
        
        if(mysqli_num_rows($query) == 0){
            set_message("Your PASSWORD or USERNAME are wrong");
            redirect("login.php");
        }else{
            $_SESSION['username'] = $username;
            // set_message("Welcome To ADMIN {$username}");
            redirect("admin");
        }
    }
}

// contact : send msg
function send_message(){
    if(isset($_POST['submit'])){
        $to = "EmailAdress@gmail.com";
        $from_name = $_POST['name'];
        $email     = $_POST['email'];
        $subject   = $_POST['subject'];
        $message   = $_POST['message'];
    
        $headers = "From: {$from_name} {$email}";
        $result = mail($to, $subject, $message, $headers);
        if(!$result){
            set_message("Sorry we couldn't send your msg");
            redirect("contact.php");
        }else{
            set_message("Your message has been sent");
            redirect("contact.php");
        }
    }

}


// *********************************************BAck End**********************************************







// ******************************* Admin Products Page****************************************************
function get_product_in_admin(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
        $category = show_product_category_title($row['product_category_id']);
        $product = <<<DELIMETER
            <tr>
                <td>{$row['product_id']}</td>
                <td>{$row['product_title']} <br>
                <a href="index.php?edit_product&id={$row['product_id']}"> <img width=100 src="../../ressources/uploads/{$row['product_image']}" alt=""></a>
                </td>
                <td>{$category}</td>
                <td>{$row['product_price']}</td>
                <td>{$row['product_quantity']}</td>
                <td><a class ="btn btn-danger" href="index.php?delete_product&id={$row['product_id']}"><span class='glyphicon glyphicon-minus' ></span></a>
            </tr>
            DELIMETER;
        echo $product;
    }
}
function show_product_category_title($product_category_id){
    $category_query = query("SELECT * FROM categories WHERE cat_id= '{$product_category_id}'");
    confirm($category_query);
    while($category_row= fetch_array($category_query)){
        return $category_row['cat_title'];
    }
}


// **************************************Add products in admin ******************************************/

function add_products(){
    if(isset($_POST['publish'])){
        $product_title         = escape_string($_POST["product_title"]);
        $product_category_id   = escape_string($_POST['product_category_id']);
        $product_price         = escape_string($_POST["product_price"]);
        $product_description   = escape_string($_POST["product_description"]);
        $short_desc            = escape_string($_POST["short_desc"]);
        $product_quantity      = escape_string($_POST["product_quantity"]);
        $product_image         = escape_string($_FILES["file"]["name"]);
        $image_temp_location   = escape_string($_FILES["file"]["tmp_name"]);
        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY .DS. $product_image);
        
        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_quantity, product_description, short_desc, product_image ) VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_quantity}','{$product_description}','{$short_desc}','{$product_image}')");
        confirm($query);
        $last_id = last_id();
        set_message("New Product with id {$last_id} Just Added");
        redirect("index.php?products");
    }

}


function show_categories_add_product_page(){
    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row= mysqli_fetch_array($query)){
        $category_option = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        echo $category_option;
    }
}


// **************************** update product *********************************

function update_product(){
    if(isset($_POST['update'])){
        $product_title         = escape_string($_POST["product_title"]);
        $product_category_id   = escape_string($_POST["product_category_id"]);
        $product_price         = escape_string($_POST["product_price"]);
        $product_description   = escape_string($_POST["product_description"]);
        $short_desc            = escape_string($_POST["short_desc"]);
        $product_quantity      = escape_string($_POST["product_quantity"]);
        $product_image         = escape_string($_FILES["file"]["name"]);
        $image_temp_location   = escape_string($_FILES["file"]["tmp_name"]);
        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY .DS. $product_image);
        
        $query = "UPDATE products SET ";
        $query .="product_title              = '{$product_title}'        ,";
        $query.= "product_category_id        = '{$product_category_id}' ,";
        $query .=" product_price             = '{$product_price}'        ,";
        $query .=" product_description       = '{$product_description}'  ,";
        $query .=" short_desc                = '{$short_desc}'           ,";
        $query .=" product_quantity          = '{$product_quantity}'     ,";
        $query .=" product_image             = '{$product_image}'        ,";
        $query .=" product_image             = '{$product_image}'         ";
        $query .="WHERE product_id=" . escape_string($_GET['id']);
        
        $send_update_query = query($query);
        confirm($send_update_query);
        $last_id = last_id();
        set_message("Product has been updated");
        redirect("index.php?products");
    }

}

?>