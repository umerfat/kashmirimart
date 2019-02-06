<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<?php include "includes/header.php"; ?>

<?php include "includes/side_top.php"; ?>

<?php include "includes/sidebar_menu.php"; ?>

<?php include "includes/top_nav.php"; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sub Category</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <!--Calling php function for inserting sub categories-->
                         <?php
                        if (isset($_POST['submit_sub_category'])) {
                            insert_sub_category();
                            }
                        ?>

                        <form class="form-horizontal form-label-left" method="post"
                              id="add-sub-category-form" enctype="multipart/form-data" action="">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="category">Add Sub Category <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <input id="name" class="form-control col-md-7
                                    col-xs-12" name="sub_cat_name" placeholder="e.g Almond"
                                           type="text" required>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <select class="form-control" name="category" required>
                                        <option value="">Choose Category</option>
                                        <?php add_category();?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button class="btn btn-primary"
                                            type="reset">Reset</button>
                                    <button id="submit" name="submit_sub_category"
                                            type="submit" class="btn
                                            btn-success">Add Sub Category
                                    </button>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        </form>
                        <?php
                        //update and include on clicking edit link
                        if (isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/update_sub_categories.php";
                        }
                        ?>

                        <table id="datatable-responsive" class="table table-striped
                        table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Take Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php findAllSubCategories(); ?>
                            <?php deleteSubCategories(); ?>

                            </tbody>
                        </table>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
