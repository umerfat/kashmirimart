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
                $sub_cat_id = $row['sub_cat_id'];
                $sub_cat_name = $row['sub_cat_name'];
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="<?php if (isset($sub_cat_name)){echo $sub_cat_name;} ?>"
                           type="text" class="form-control col-md-7 col-xs-12"
                           name="sub_cat_name">
                </div>
                <?php
        }
        ?>
        <!--Update query-->
        <?php
        if (isset($_POST['update_sub_category'])){

            $sub_cat_name_edit = $_POST['sub_cat_name'];
            $query  = "UPDATE tbl_sub_category SET sub_cat_name = '{$sub_cat_name_edit}' WHERE sub_cat_id 
                    = {$sub_cat_id}";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query){
                die("Query Failed " . mysqli_error($connection));
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