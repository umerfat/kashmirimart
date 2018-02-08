<?php

if (isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $itemValueId){

        $bulkOptions = $_POST['bulkOptions'];
        switch ($bulkOptions){

            case '1':
                $query = "UPDATE tbl_item SET item_status = '{$bulkOptions}' WHERE item_id = {$itemValueId}";
                $display_item_status = mysqli_query($connection, $query);
                confirmQuery($display_item_status);
                break;

            case '0':
                $query = "UPDATE tbl_item SET item_status = '{$bulkOptions}' WHERE item_id = {$itemValueId}";
                $hide_item_status = mysqli_query($connection, $query);
                confirmQuery($hide_item_status);
                break;

            case 'delete';
                $query = "DELETE FROM tbl_item WHERE item_id = {$itemValueId}";
                $delete_post = mysqli_query($connection, $query);
                confirmQuery($delete_post);
                break;
        }
    }
}

?>

<form action="" method="post">
    <div class="container" style="margin-left: 10px">
        <div class="row">
            <div class="col-xs-4" id="bulkOptionsContainer">
                <select name="bulkOptions" id="" class="form-control">
                    <option value="">Select Options</option>
                    <option value="1">Activate</option>
                    <option value="0">Inactivate</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a class="btn btn-success" href="items.php?source=add_item">Add New</a>
            </div>
        </div>
    </div>
    <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Category</th>
            <th>Date</th>
            <th>Take Action</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $query  = "SELECT item_id, item_sub_cat_id, item_name, item_image, item_status,created_date FROM tbl_item";
        $select_items = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_items)){

            $item_id         = $row['item_id'];
            $item_name       = $row['item_name'];
            $item_sub_cat_id = $row['item_sub_cat_id'];
            $item_image      = $row['item_image'];
            //$item_status = $row['item_description'];
            $item_date       = $row['created_date'];
            echo "<tr>";

            ?>

            <td>
                <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $item_id; ?>">
            </td>

            <?php
            echo "<td>{$item_id}</td>";
            echo "<td>{$item_name}</td>";
            echo "<td><img src='ITEM_IMAGES/{$item_image}' height='40px'></td>";
            echo "<td>{$item_sub_cat_id}</td>";
            echo "<td>{$item_date}</td>";
            echo "<td class='col-sm-2'>
                    <ul class='take-action'>
                    <li><a href='items.php?source=edit_item&p_id={$item_id}' class='btn btn-info'><i class='fa fa-pencil'></i> 
                </a></li>
                    <li><a onclick=\"javascript:; return confirm('Are you sure you want to delete')\" href='items.php?delete={$item_id}' class='btn btn-danger'><i
                 class='fa fa-trash-o'></i> 
                </a></li>
                    </ul>
              </td>";
            echo "</tr>";
        }

        ?>

        </tbody>
    </table>
</form>

<?php

//deleting post
if (isset($_GET['delete'])){

    $delete_item_id = $_GET['delete'];
    $query = "DELETE FROM tbl_item WHERE item_id = {$delete_item_id}";
    $delete_query = mysqli_query($connection, $query);

    redirect("items.php");
}
