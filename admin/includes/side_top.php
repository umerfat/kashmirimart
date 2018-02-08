<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="USER_IMAGES/default_image.png" height="40px"></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <?php
                $query = "SELECT * FROM tbl_user WHERE username = '{$_SESSION['username']}'";
                $select_query = mysqli_query($connection, $query);
                confirmQuery($select_query);
                $row = mysqli_fetch_assoc($select_query);

                    $user_image = trim($row['user_image']);

                    if (empty($user_image)){
                        echo "<img src='USER_IMAGES/default_image.png' alt='' class='img-circle profile_img'>";
                    }
                    else{
                        echo "<img src='USER_IMAGES/$user_image' alt='no img '  class='img-circle profile_img'>" . $_SESSION['username'];
                    }
                ?>
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo strtoupper($_SESSION['firstname'])?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>