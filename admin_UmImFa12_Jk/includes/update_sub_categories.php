<form class="form-horizontal form-label-left margintb20" id="x" method="post">
    <div class="item form-group" id="hide_update">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"
               for="update_category">Update Category <span
                    class="required">*</span>
        </label>
        <!--Editing categories-->
        <?php
        if (isset($_GET['edit']) || isset($_POST['update_category'])){

            $sub_cat_id = $_GET['edit'];
            $query = "SELECT * FROM tbl_sub_category WHERE sub_cat_id = {$sub_cat_id} ";
            $select_categories = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_categories);
            $sub_cat_id        = trim($row['sub_cat_id']);
            $sub_cat_name      = trim($row['sub_cat_name']);
            $cat_id_sub        = trim($row['cat_id']);
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?php if (isset($sub_cat_name)){echo $sub_cat_name;} ?>"
                           type="text" class="form-control col-md-7 col-xs-12"
                           name="sub_cat_name">
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <select class="form-control" name="category_update" required>
                        <?php
                        $query = "SELECT * FROM tbl_category";
                        $category_query = mysqli_query($connection, $query);
                        confirmQuery($category_query);
                        while($row = mysqli_fetch_assoc($category_query)) {

                            $cat_id    = trim($row["cat_id"]);
                            $cat_name  = trim($row["cat_name"]);
                            if ($cat_id == $cat_id_sub){
                                echo "<option selected value='{$cat_id}'>{$cat_name}</option>";
                            }
                            else{
                                echo "<option value='{$cat_id}'>{$cat_name}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php
        }
        ?>
        <!--Update query-->
        <?php
        if (isset($_POST['update_sub_category'])){

            $sub_cat_name_edit = $_POST['sub_cat_name'];
            $cat_id_edit       = $_POST['category_update'];
            $query  = "UPDATE tbl_sub_category SET cat_id = '{$cat_id_edit}', sub_cat_name = '{$sub_cat_name_edit}' WHERE sub_cat_id 
                    = {$sub_cat_id}";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query){
                die("Query Failed " . mysqli_error($connection));
            }
            else{
                echo "
                <div class='col-md-12'>
                  <div class='alert alert-success alert-dismissable fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Sub category updated.!</strong>
                  </div>
                </div>
                ";
            }
        }
        ?>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button id="submit" name="update_sub_category"
                    type="submit" class="btn btn-success">Update Category
            </button>
        </div>
    </div>
    <div class="ln_solid"></div>
</form>