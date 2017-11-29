<?php

if (isset($_GET['p_id'])){

    $edit_p_id = $_GET['p_id'];

    $query = "SELECT * FROM tbl_item WHERE item_id = $edit_p_id";
    $select_items_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_items_by_id)) {

        $item_id          = trim($row['item_id']);
        $item_name        = trim($row['item_name']);
        $item_status      = trim($row['item_status']);
        $item_image       = trim($row['item_image']);
        $item_description = mysqli_real_escape_string($connection, $row['item_description']);
    }
}

if (isset($_POST['update_item'])){

    $item_name        = $_POST['name'];
    $item_cat_id      = $_POST['category'];
    $item_status      = $_POST['status'];
    $item_image       = $_POST['imagename']['name'];
    $item_tmp_image   = $_POST['imagename']['tmp_name'];
    $item_description = $_POST['item_description'];
    $item_description = str_replace("'", "''", $item_description);

    move_uploaded_file($item_tmp_image, "ITEM_IMAGES/$item_image");

    if (empty($item_image)){
        $query = "SELECT * FROM tbl_item WHERE item_id = $edit_p_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)){
            $item_image = $row['item_image'];
        }
    }

    $query  = "UPDATE tbl_item SET ";
    $query .= "item_cat_id ='{$item_cat_id}', ";
    $query .= "item_name = '{$item_name}', ";
    $query .= "item_image = '{$item_image}' ";
    $query .= "item_description = '{$item_description}', ";
    $query .= "item_status = '{$item_status}', ";
    $query .= " WHERE item_id = '{$edit_p_id}'";

    $update_query = mysqli_query($connection, $query);
    if (!$update_query){

        die("Query failed " . mysqli_error($connection));
    }
    else{
        echo "
            <div class='col-md-12 col-xs-12'>
              <div class='alert alert-success alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;                 </a>
                <strong>{$item_name} has updated!</strong>
              </div>
            </div>
            ";
    }
}

?>

<form class="form-horizontal form-label-left" action="#" method="POST"
      enctype="multipart/form-data">
    <div class="item form-group">
        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="name">Name </label>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="name" class="form-control col-md-7 col-xs-12"
                   name="name" type="text" value="<?php echo $item_name; ?>">
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="category">Category </label>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <select class="form-control" name="category">
                <?php
                $query = "SELECT * FROM tbl_category";
                $category_query = mysqli_query($connection, $query);
                confirmQuery($category_query);
                while($row = mysqli_fetch_assoc($category_query)) {

                    $cat_id   = trim($row["cat_id"]);
                    $cat_name = trim($row["cat_name"]);
                    if ($cat_id == $item_cat_id){
                        echo "<option selected value='{$cat_id}'>{$cat_name}</option>";
                    }
                    else{
                        echo "<option value='{$cat_id}'>{$cat_name}</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="status">Status </label>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <select class="form-control" name="status">
                <option value='<?php echo $item_status; ?>'><?php echo ucfirst
                    ($item_status); ?></option>
                <?php
                if ($item_status == '1'){
                    echo "<option value='0'>Inactive</option>";
                }
                else{
                    echo "<option value='1'>Active</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="image">Image </label>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <img src="ITEM_IMAGES/<?php echo $item_image; ?>" width="200" alt="Image not
            displayed" class="img-responsive">
            <input type="file" id="image" name="imagename" class="form-control col-md-7
            col-xs-12">
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="content">Content </label>
        <div class="col-md-10 col-sm-12 col-xs-12">
            <textarea name="item_description" id="content" cols="30" rows="6" class="form-control
            col-md-7 col-xs-12"><?php echo $item_description; ?></textarea>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-1">
            <button id="item-submit" name="update_item" type="submit" class="btn
            btn-success">Submit</button>
        </div>
    </div>
</form>