<?php

function confirmQuery($result){

    global $connection;
    if (!$result) {
        die("Query Failed " . mysqli_error($connection));
    }
}

function redirect($location){

    header("Location: " . $location);
}

function set_message($message){

    if(!empty($message)){

        $_SESSION['message'] = $message;
    }
    else{
        $message = "";
    }
}

function clean($string){
    return htmlentities($string);
}

function display_message(){

    if(isset($_SESSION['message'])){

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function validation_errors($error_message){
    $alert_error_message = "
    <div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>Warning!</strong>
    {$error_message}
    </div>
    ";
    return $alert_error_message;
}

//Add post
function add_item(){

    global $connection;
    if (isset($_POST['add_item'])){

        $item_name           = clean($_POST['name']);
        $item_sub_cat_id     = clean($_POST['sub_category']);
        $item_status         = clean($_POST['status']);
        $item_image          = $_FILES['image']['name'];
        $item_tmp_image      = $_FILES['image']['tmp_name'];
        $item_description_sh = clean($_POST['description_sh']);
        $item_description_lg = clean($_POST['description_lg']);
        $item_description_sh = str_replace("'", "''", $item_description_sh);
        $item_description_lg = str_replace("'", "''", $item_description_lg);

        move_uploaded_file($item_tmp_image, "ITEM_IMAGES/$item_image");

        $query  = "INSERT INTO tbl_item(item_sub_cat_id, item_name, item_image, item_description_sh, item_description_lg, item_status) ";
        $query .= "VALUES({$item_sub_cat_id}, '{$item_name}', '{$item_image}', '{$item_description_sh}', '{$item_description_lg}', '{$item_status}')";

        $insert_query = mysqli_query($connection, $query);
        if (!$insert_query){

            die("Query failed " . mysqli_error($connection));
        }
        else{
            echo "
            <div class='col-md-12 col-xs-12'>
              <div class='alert alert-success alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;                 </a>
                <strong>{$item_name} item added!</strong>
              </div>
            </div>
            ";
        }
    }
}

function add_category(){
    global $connection;
    $query = "SELECT * FROM tbl_category";
    $category_query = mysqli_query($connection, $query);
    if (!$category_query){
        die("Query failed " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($category_query)){
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
        echo "<option value='{$cat_id}'>{$cat_name}</option>";
    }
}

function add_item_category(){

    global $connection;
    $query_cat = "SELECT cat_id, cat_name FROM tbl_category";
    $cat_result = mysqli_query($connection, $query_cat);
    if (!$cat_result){

        die("Query failed " . mysqli_error($connection));
    }
    while ($row_cat = mysqli_fetch_assoc($cat_result)){

        $cat_id   = trim($row_cat['cat_id']);
        $cat_name = trim($row_cat['cat_name']);

        $query_sub_cat = "SELECT sub_cat_id, sub_cat_name FROM  tbl_sub_category WHERE cat_id = '{$cat_id}'";
        $sub_cat_result = mysqli_query($connection, $query_sub_cat);
        if (mysqli_num_rows($sub_cat_result) > 0) {
                    echo "<option style ='font-weight: bold;font-size:17px' value='{$cat_id}' disabled>{$cat_name}</option>";

        }   
        while ($row_cat_sub = mysqli_fetch_assoc($sub_cat_result)) {

            $sub_cat_id   = trim($row_cat_sub['sub_cat_id']);
            $sub_cat_name = trim($row_cat_sub['sub_cat_name']);
            echo "<option value='{$sub_cat_id}'>{$sub_cat_name}</option>";
        }

    }
}
//Add User
function add_user(){

    global $connection;
    if (isset($_POST['create_user'])){

        $user_firstname = $_POST['first_name'];
        $user_lastname = $_POST['last_name'];
        $username = $_POST['username'];
        $user_image = $_FILES['user_image']['name'];
        $user_tmp_image = $_FILES['user_image']['tmp_name'];
        $user_role = $_POST['role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_password = password_hash($user_password, PASSWORD_BCRYPT);

        move_uploaded_file($user_tmp_image, "USER_IMAGES/$user_image");

        $query  = "INSERT INTO users(username, user_firstname, user_lastname, user_image, user_role, user_email, user_password) ";
        $query .= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_image}', '{$user_role}', '{$user_email}', '{$user_password}')";

        $insert_query = mysqli_query($connection, $query);
        if (!$insert_query){

            die("Query failed " . mysqli_error($connection));
        }
        else{
            echo "
            <div class='col-md-12 col-xs-12'>
              <div class='alert alert-success alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert'
                aria-label='close'>&times;                 </a>
                <strong>User with {$username} is created!</strong>
              </div>
            </div>
            ";
        }
    }
}

function login_user(){

    global $connection;
    if (isset($_POST['user_login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM tbl_user WHERE username = '{$username}'";
        $select_query = mysqli_query($connection, $query);
        if (!$select_query){
            die("Failed " . mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_query);
            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];

        if ($username !== $db_username && $password !== $db_password){

            redirect("index.php");
        }
        elseif (password_verify($password, $db_password)){

            $_SESSION['username']  = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname']  = $db_user_lastname;
            redirect("dashboard.php");
        }
        else{

            redirect("index.php");
        }

//    login_user($_POST['username'], $_POST['password']);
    }
}

function insert_category(){

    global $connection;
    if (isset($_POST['submit_category'])) {

        $cat_name = $_POST['cat_name'];

        if ($cat_name == "" || empty($cat_name)) {

            echo "
            <div class='col-md-12'>
              <div class='alert alert-danger alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>This field cannot be empty.!</strong>
              </div>
            </div>
            ";
        } else {
            $query = "INSERT INTO tbl_category(cat_name) ";
            $query .= "VALUES('{$cat_name}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {

                die("Query failed " . mysqli_error($connection));
            } else {
                echo "
            <div class='col-md-12'>
              <div class='alert alert-success alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Category inserted successfully.!</strong>
              </div>
            </div>
            ";
            }
        }
    }
}

function insert_sub_category(){

    global $connection;
    if (isset($_POST['submit_sub_category'])) {

        $sub_cat_name = $_POST['sub_cat_name'];
        $cat_id       = $_POST['category'];

        if (empty($sub_cat_name)) {

            echo "
            <div class='col-md-12'>
              <div class='alert alert-danger alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>This field cannot be empty.!</strong>
              </div>
            </div>
            ";
        } else {
            $query = "INSERT INTO tbl_sub_category(sub_cat_name,cat_id) ";
            $query .= "VALUES('{$sub_cat_name}','{$cat_id}')";
            $create_sub_category_query = mysqli_query($connection, $query);
            if (!$create_sub_category_query) {
                die("Query failed " . mysqli_error($connection));
            } else {
                echo "
            <div class='col-md-12'>
              <div class='alert alert-success alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Sub Category inserted successfully.!</strong>
              </div>
            </div>
            ";
            }
        }
    }
}

function findAllCategories(){

    global $connection;
    $query = "SELECT * FROM tbl_category";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {

        $cat_id = $row['cat_id'];
        $cat_name = ucfirst($row['cat_name']);
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_name}</td>";
        echo "<td>
                <a href='categories.php?edit={$cat_id}' class='btn btn-info'><i class='fa fa-pencil'></i>
                </a>
                <a onclick=\"javascript:; return confirm('Are you sure you want to delete')\" href='categories.php?delete={$cat_id}' class='btn btn-danger'><i class='fa fa-trash-o'></i>
                </a>
               </td>";
        echo "</tr>";
    }
}

function findAllSubCategories(){

    global $connection;
    $query = "SELECT * FROM tbl_sub_category";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {

        $sub_cat_id = $row['sub_cat_id'];
        $sub_cat_name = ucfirst($row['sub_cat_name']);
        echo "<tr>";
        echo "<td>{$sub_cat_id}</td>";
        echo "<td>{$sub_cat_name}</td>";
        echo "<td>
                <a href='sub_categories.php?edit={$sub_cat_id}' class='btn btn-info'><i class='fa fa-pencil'></i>
                </a>
                <a onclick=\"javascript:; return confirm('Are you sure you want to delete')\" href='sub_categories.php?delete={$sub_cat_id}' class='btn btn-danger'><i class='fa fa-trash-o'></i>
                </a>
               </td>";
        echo "</tr>";
    }
}

function deleteCategories(){

    global $connection;

    if (isset($_GET['delete'])) {

        $cat_id_delete = $_GET['delete'];
        $query = "DELETE FROM tbl_category WHERE cat_id = {$cat_id_delete} ";
        $delete_query = mysqli_query($connection, $query);
        redirect("categories.php");
    }
}

function deleteSubCategories(){

    global $connection;

    if (isset($_GET['delete'])) {

        $cat_id_delete = $_GET['delete'];
        $query = "DELETE FROM tbl_sub_category WHERE sub_cat_id = {$cat_id_delete} ";
        $delete_query = mysqli_query($connection, $query);
        redirect("sub_categories.php");
    }
}


function update_profile(){

    global $connection;
    if (isset($_POST['update_profile'])) {

        $user_firstname = $_POST['first_name'];
        $user_lastname = $_POST['last_name'];
        $username = $_POST['username'];
        $user_image = $_FILES['user_image']['name'];
        $user_tmp_image = $_FILES['user_image']['tmp_name'];
        $user_role = $_POST['role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        //$user_password = password_hash($user_password, PASSWORD_BCRYPT);

        move_uploaded_file($user_tmp_image, "USER_IMAGES/$user_image");

        if (empty($user_image)) {
            $query = "SELECT * FROM tbl_user WHERE username = '{$username}'";
            $select_image = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($select_image)) {
                $user_image = $row['user_image'];
            }
        }

        $query = "UPDATE tbl_user SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}'";

        $update_query = mysqli_query($connection, $query);
        if (!$update_query) {

            die("Query failed " . mysqli_error($connection));
        } else {
            echo "
                        <div class='col-md-12 col-xs-12'>
                            <div class='alert alert-success alert-dismissable fade in'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;                 
                                </a>
                                <strong>{$username} has updated!</strong>
                            </div>
                        </div>
                        ";
        }
    }
}

function recordCount($table){

    global $connection;
    $query = "SELECT * FROM " . $table;
    $select_query = mysqli_query($connection, $query);
    $count_rows = mysqli_num_rows($select_query);
    return $count_rows;
}

// Functions for front end to display information to customers

function get_category(){

    global $connection;
    $select_cat = "SELECT * FROM tbl_category";
    $result = mysqli_query($connection, $select_cat);
    $catArray = array();
    while($row = mysqli_fetch_assoc($result)) {
        $catArray[] = $row;
    }
    $i = 0;
    foreach ($catArray as $cat) {
        //print_r($catArray);
        $cat_id   = trim($cat['cat_id']);
        $cat_name = trim($cat['cat_name']);
    echo "<li class='active'>";
    ++$i;
       echo " <a href='javascript:void(0)' data-toggle='collapse' data-target='#toggleDemo-$i' data-parent='#sidenav01' class='collapsed'>$cat_name<span class='caret pull-right'></span>
        </a>";
        echo "<div class='collapse' id='toggleDemo-$i' style='height: 0px;'>
            <ul class='nav nav-list'> " ;
                 $select_sub_cat = "SELECT * FROM tbl_sub_category WHERE cat_id = $cat_id";
                 $subCatArray = array();
                 $result_sub = mysqli_query($connection, $select_sub_cat);
                 while($sub_row = mysqli_fetch_assoc($result_sub)) {
                  $subCatArray[] = $sub_row;
                 }
                 if (sizeof($subCatArray) < 1) {
                     echo "<p>No sub category found</p>";
                 }
                 else{
                    foreach ($subCatArray as $sub_cat) {
                    $sub_cat_id   = trim($sub_cat['sub_cat_id']);
                    $sub_cat_name = trim($sub_cat['sub_cat_name']);
                    $sub_cat      = $sub_cat_id +1375;
                    //$sub_cat      = base64_encode($sub_cat_id);
                    echo "<li><a href='category.php?sub_category=$sub_cat'>$sub_cat_name</a></li>";
                 }
                 }
        echo "</ul>";   
        echo "</div>";
    echo "</li>";
      }
}  