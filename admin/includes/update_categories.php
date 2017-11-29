<form class="form-horizontal form-label-left margintb20" id="x" method="post">
    <div class="item form-group" id="hide_update">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"
               for="update_category">Update Category <span
                    class="required">*</span>
        </label>
        <!--Editing categories-->
        <?php
        if (isset($_GET['edit']) || isset($_POST['update_category'])){

            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM tbl_category WHERE cat_id = {$cat_id} ";
            $select_categories = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_categories);
                $cat_id = $row['cat_id'];
                $cat_name = $row['cat_name'];
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="<?php if (isset($cat_name)){echo $cat_name;} ?>"
                           type="text" class="form-control col-md-7 col-xs-12"
                           name="cat_name">
                </div>
                <?php
        }
        ?>
        <!--Update query-->
        <?php
        if (isset($_POST['update_category'])){

            $cat_name_edit = $_POST['cat_name'];
            $query  = "UPDATE tbl_category SET cat_name = '{$cat_name_edit}' WHERE cat_id 
                    = {$cat_id}";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query){
                die("Query Failed " . mysqli_error($connection));
            }
        }
        ?>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button id="submit" name="update_category"
                    type="submit" class="btn btn-success">Update Category
            </button>
        </div>
    </div>
    <div class="ln_solid"></div>
</form>