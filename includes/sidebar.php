<div class="affix-sidebar">
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Categories</span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <h4 class="cat-text">Categories</h4>
                <ul class="nav navbar-nav" id="sidenav01">
                    <?php
                    global $connection;
                    $select_cat = "SELECT * FROM tbl_category";
                    $result = mysqli_query($connection, $select_cat);
                    // while($row = mysqli_fetch_assoc($result)) {
                    //     $var[] = $row;
                    // }
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li class="active">
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed"><?php echo trim($row['cat_name'])?> <span class="caret pull-right"></span>
                        </a>
                        <div class="collapse" id="toggleDemo" style="height: 0px;">
                            <ul class="nav nav-list">
                                <?php
                                $cat_id = trim($row['cat_id']);
                                $select_sub_cat = "SELECT * FROM tbl_sub_category WHERE cat_id =  $cat_id";
                                $result = mysqli_query($connection, $select_sub_cat);
                                while($sub_row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <li><a href="item.php"><?php echo $sub_row['sub_cat_name']?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>   
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                   <!--  <li>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">Cat sub 2 <span class="caret pull-right"></span>
                        </a>
                        <div class="collapse" id="toggleDemo2" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="item.php">Submenu2.1</a></li>
                                <li><a href="item.php">Submenu2.2</a></li>
                                <li><a href="item.php">Submenu2.3</a></li>
                            </ul>
                        </div>
                    </li> -->
                  <!--   <li><a href="#">cat 2</a></li>
                    <li><a href="#">cat 3</a></li>
                    <li><a href="#">cat 4</a></li> -->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>