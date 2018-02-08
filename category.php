<?php include "includes/header.php"; ?>
<?php include "includes/slider.php"; ?>
<!--<div id="wrap-body">-->
<!--    <div class="container">-->
<!--        <div class="wrap-body-inner">-->
<!--            <!-- Product grid -->
<!--            <section class="m-t-lg-30 m-t-xs-0">-->
<!--                <div class="row">-->
<!--                    <div class="col-sm-4 col-md-3 col-lg-3">-->
<!--                        <!-- Caterory -->
<!--                        --><?php //include "includes/sidebar.php"; ?>
<!--                    </div>-->
<!--                   --><?php
//                   if (htmlentities(    $_GET['sub_category']) > 1) {
//                       $_SESSION['sub_cat'] = htmlentities($_GET['sub_category']);
//                   }
//                   if(htmlentities($_GET['sub_category']) > 1  || isset($_GET['page'])){
//                    ?>
<!--                     <div class="col-sm-8 col-md-9 col-lg-9">-->
<!--                        <div class="product product-grid">-->
<!--                            <div class="row">-->
<!--                            --><?php
//                            $per_page = 3;
//                            if (isset($_GET['page'])){
//                                $page = $_GET['page'];
//                            }
//                            else{
//                                $page = "";
//                            }
//                            if ($page == "" || $page == 1){
//                                $page_1 = 0;//for index page
//                            }
//                            else{
//                                $page_1 = ($page * $per_page) - $per_page;//it will give us five every page
//                            }
//                            $sub_cat_id = $_SESSION['sub_cat'];
//                            $sub_cat_id = ($sub_cat_id - 1375);
//                            $count_query  = "SELECT * FROM tbl_item WHERE item_sub_cat_id = $sub_cat_id";
//                            $count_result = mysqli_query($connection,$count_query);
//                            $count_1      = mysqli_num_rows($count_result);
//                            $count        = ceil($count_1/$per_page);
//                             //$sub_cat_id = base64_decode($sub_cat_id);
//
//                             $select_random = "SELECT * FROM tbl_item WHERE item_sub_cat_id = $sub_cat_id LIMIT $page_1,$per_page";
//                             // $select_random = "SELECT a.* FROM tbl_item a, (SELECT max(item_id)*rand() randid  FROM tbl_item) b  WHERE a.item_id >= b.randid limit 3";
//                             $random_result = mysqli_query($connection, $select_random);
//                                while($row_random = mysqli_fetch_assoc($random_result)) {
//
//                                    $item_id      = trim($row_random['item_id']) + 2323;
//                                    $item_name    = trim($row_random['item_name']);
//                                    $item_price   = trim($row_random['item_price']);
//                                    $item_image   = trim($row_random['item_image']);
//                            ?>
<!--                                    <div class="col-sm-6 col-md-4 col-lg-4">-->
<!--                                        <!-- Product item -->-->
<!--                                        <div class="product-item">-->
<!--                                            <a href="item.php?item_details=--><?php //echo $item_id;?><!--" class="product-img"><img src=--><?php //echo "admin/ITEM_IMAGES/".$item_image ?><!-- alt="image"></a>-->
<!--                                            <div class="product-caption">-->
<!--                                                <h4 class="product-name"><a href="item.php?item_details=--><?php //echo $item_id;?><!--"> --><?php //echo $item_name." ".$count_1  ?><!--</a></h4>-->
<!--                                                <ul class="rating">-->
<!--                                                    <li class="active"><i class="fa fa-star"></i></li>-->
<!--                                                    <li class="active"><i class="fa fa-star"></i></li>-->
<!--                                                    <li class="active"><i class="fa fa-star"></i></li>-->
<!--                                                    <li><i class="fa fa-star"></i></li>-->
<!--                                                    <li><i class="fa fa-star"></i></li>-->
<!--                                                </ul>-->
<!--                                                <div class="product-price-group">-->
<!--                                                    <span class="product-price">Rs. --><?php //echo $item_price?><!--</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!--                                    --><?php
//                                }?>
<!--                            </div>-->
<!--                                <nav aria-label="Page navigation" style="text-align: right">-->
<!--                                <ul class="pagination ht-pagination">-->
<!--                                    --><?php //echo "<li>
//                                        <a href='category.php?page=".($page--)."' aria-label='Previous'>
//                                            <span aria-hidden='true'><i class='fa fa-chevron-left'></i></span>
//                                        </a>
//                                    </li>";
//                        for ($i = 1; $i <= $count; $i++){
//                            if ($i == $page){
//                                echo "<li><a class='active' href='category.php?page={$i}'>{$i}</a> </li>";
//                            }
//                            else{
//                                echo "<li><a href='category.php?page={$i}'>{$i}</a></li>";
//                            }
//                        }
//
//                                    echo "<li>
//                                        <a href='category.php?page=".($page++)."' aria-label='Next'>
//                                            <span aria-hidden='true'><i class='fa fa-chevron-right'></i></span>
//                                        </a>
//                                    </li>";
//                                      ?>
<!--                                </ul>-->
<!--                            </nav>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    --><?php
//                   }
//                   ?>
<!--                </div>-->
<!--            </section>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


    <div id="wrap-body">
        <div class="container">
            <div class="wrap-body-inner">
                <!-- Product grid -->
                <section class="m-t-lg-30 m-t-xs-0">
                    <div class="row">
                        <div class="col-sm-4 col-md-3 col-lg-3">
                            <!-- Caterory -->
                            <?php include "includes/sidebar.php"; ?>
                        </div>
                        <?php
                        if (htmlentities(    $_GET['sub_category']) > 1) {
                            $_SESSION['sub_cat'] = htmlentities($_GET['sub_category']);
                        }
                        if(htmlentities($_GET['sub_category']) > 1  || isset($_GET['page'])){
                            ?>
                            <div class="col-sm-8 col-md-9 col-lg-9">
                                <div class="product product-grid">
                                    <div class="row">
                                        <?php
                            $per_page = 3;
                            if (isset($_GET['page'])){
                                $page = $_GET['page'];
                            }
                            else{
                                $page = 0;
                            }
                            if ($page == 0 || $page == 1){
                                $page_1 = 0;//for index page
                            }
                            else{
                                $page_1 = ($page * $per_page) - $per_page;//it will give us five every page
                            }
                            $sub_cat_id = $_SESSION['sub_cat'];
                            $sub_cat_id = ($sub_cat_id - 1375);
                            $count_query  = "SELECT * FROM tbl_item WHERE item_sub_cat_id = $sub_cat_id";
                            $count_result = mysqli_query($connection,$count_query);
                            $count_1      = mysqli_num_rows($count_result);
                            $count        = ceil($count_1/$per_page);
                             //$sub_cat_id = base64_decode($sub_cat_id);
                             
                             $select_random = "SELECT * FROM tbl_item WHERE item_sub_cat_id = $sub_cat_id LIMIT $page_1,$per_page";
                             // $select_random = "SELECT a.* FROM tbl_item a, (SELECT max(item_id)*rand() randid  FROM tbl_item) b  WHERE a.item_id >= b.randid limit 3";
                             $random_result = mysqli_query($connection, $select_random);
                                while($row_random = mysqli_fetch_assoc($random_result)) {

                                    $item_id      = trim($row_random['item_id']) + 2323;
                                    $item_name    = trim($row_random['item_name']);
                                    $item_price   = trim($row_random['item_price']);
                                    $item_image   = trim($row_random['item_image']);
                            ?>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <!-- Product item -->
                                                <div class="product-item">
                                                    <a href="item.php?item_details=<?php echo $item_id;?>" class="product-img"><img src=<?php echo "admin/ITEM_IMAGES/".$item_image ?> alt="image"></a>
                                                    <div class="product-caption">
                                                        <h4 class="product-name"><a href="item.php?item_details=<?php echo $item_id;?>"> <?php echo $item_name." ".$count_1  ?></a></h4>
                                                        <ul class="rating">
                                                            <li class="active"><i class="fa fa-star"></i></li>
                                                            <li class="active"><i class="fa fa-star"></i></li>
                                                            <li class="active"><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <div class="product-price-group">
                                                            <span class="product-price">Rs. <?php echo $item_price?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                    <nav aria-label="Page navigation" style="text-align: right">
                                        <ul class="pagination ht-pagination">
                                             <?php 
                                    if ($page > 0) {
                                        echo "<li>
                                        <a href='category.php?page=".($page-1)."' aria-label='Previous'>
                                            <span aria-hidden='true'><i class='fa fa-chevron-left'></i></span>
                                        </a>
                                    </li>";
                                    }
                        for ($i = 1; $i <= $count; $i++){
                            if ($i == $page){
                                echo "<li><a class='active' href='category.php?page={$i}'>{$i}</a> </li>";
                            }
                            else{
                                echo "<li><a href='category.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                                    if ($page < $count) {
                                        echo "<li>
                                        <a href='category.php?page=".($page+1)."' aria-label='Next'>
                                            <span aria-hidden='true'><i class='fa fa-chevron-right'></i></span>
                                        </a>
                                    </li>";
                                    }
                                      ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
            </div>
        </div>
        </section>
    </div>
    </div>
    </div>

<?php include "includes/footer.php"; ?>