<?php include "includes/header.php"; ?>

<?php include "includes/side_top.php"; ?>

<?php include "includes/sidebar_menu.php"; ?>

<?php include "includes/top_nav.php"; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-edit"></i></div>

                                    <?php
                                    $post_count = recordCount('tbl_item');
                                    echo "<div class='count'>{$post_count}</div>";
                                    ?>
                                    <h3>Items</h3>
                                    <?php
                                    $query = "SELECT * FROM tbl_item WHERE item_status = '1'";
                                    $select_query = mysqli_query($connection, $query);
                                    $active_count = mysqli_num_rows($select_query);
                                    echo " <span class='count_bottom'><i class='green'>&nbsp;&nbsp;{$active_count} </i>&nbsp; Items Active</span>";
                                    ?>
                                    <br>
                                    <?php
                                    $query = "SELECT * FROM tbl_item WHERE item_status = '0'";
                                    $select_query = mysqli_query($connection, $query);
                                    $inactive_count = mysqli_num_rows($select_query);
                                    echo " <span class='count_bottom'><i class='green'>&nbsp;&nbsp;{$inactive_count} </i>&nbsp; Items Inactive</span>";
                                    ?>
                                </div>
                            </div>

                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <?php
                                    $user_count = recordCount('tbl_user');
                                    echo "<div class='count'>{$user_count}</div>";
                                    ?>
                                    <h3>Users</h3>
                                    <?php
                                    $query = "SELECT * FROM tbl_user";
                                    $select_query = mysqli_query($connection, $query);
                                    $count = mysqli_num_rows($select_query);
                                    echo " <span class='count_bottom'><i class='green'>&nbsp;&nbsp;{$count} </i>&nbsp; Admins</span>";
                                    ?>
                                    <br>
                                    <span class='count_bottom'><i class='green'>&nbsp;&nbsp;0</i>&nbsp; Staff</span>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-folder-o"></i></div>
                                    <?php
                                    $cat_count = recordCount('tbl_category');
                                    echo "<div class='count'>{$cat_count}</div>";
                                    ?>
                                    <h3>Categories</h3><br><br>
                                    <?php
                                    //$query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                                    $cat_count = recordCount('tbl_category');
                                    //$count = mysqli_num_rows($select_query);
                                    // echo " <span class='count_bottom'><i class='green'>&nbsp;&nbsp;{$count} </i>&nbsp; Comments Approved</span>";
                                    ?>
                                </div>
                            </div>
                            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-folder-o"></i></div>
                                    <?php
                                    $sub_cat_count = recordCount('tbl_sub_category');
                                    echo "<div class='count'>{$sub_cat_count}</div>";
                                    ?>
                                    <h3>Sub Categories</h3>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
