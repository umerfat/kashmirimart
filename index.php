<?php include "includes/header.php"; ?>
<?php include "includes/slider.php"; ?>
<!-- Main content -->
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
                  if (isset($_POST['submit_search']) AND !empty($_POST['search_item'])) {

                     $search_item   = htmlentities($_POST['search_item']);
                     //echo $search_item;
                     $search_query  = "SELECT * FROM tbl_item WHERE item_name LIKE '%$search_item%' OR item_price LIKE '%$search_item%'";
                     $search_result = mysqli_query($connection,$search_query) ;
                     if (mysqli_num_rows($search_result) < 1) {

                         echo "<div class='alert alert-info searchalert'>
                             <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                         No match found for your search</div> ";
                     }
                     else{
                       $labour_table = array();
                       while ($row = mysqli_fetch_assoc($search_result)) {
                           $item_table[] = $row;
                       }
                       ?>
                        <div class="col-sm-8 col-md-9 col-lg-9">
                        <div class="product product-grid">
                            <div class="row">
                               <?php
                               //$sub_cat_id = htmlentities($_GET['sub_category']);
                               //$sub_cat_id = base64_decode($sub_cat_id);
                               //$sub_cat_id = $sub_cat_id - 1375;
                               //$select_random = "SELECT * FROM tbl_item WHERE item_sub_cat_id = $sub_cat_id";
                               // $select_random = "SELECT a.* FROM tbl_item a, (SELECT max(item_id)*rand() randid  FROM tbl_item) b  WHERE a.item_id >= b.randid limit 3";
                               //$random_result = mysqli_query($connection, $select_random);
                                  foreach( $item_table as $search_data) {

                                      $item_id      = trim($search_data['item_id']) + 2323;
                                      $item_name    = trim($search_data['item_name']);
                                      $item_price   = trim($search_data['item_price']);
                                      $item_image   = trim($search_data['item_image']); 
                                      ?>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <!-- Product item -->
                                        <div class="product-item">
                                            <a href="item.php?item_details=<?php echo $item_id;?>" class="product-img"><img src=<?php echo "admin/ITEM_IMAGES/".$item_image ?> alt="image"></a>
                                            <div class="product-caption">
                                                <h4 class="product-name"><a href="item.php?item_details=<?php echo $item_id;?>"> <?php echo $item_name ?></a></h4>
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
                                //}
                  }
                                ?>
                            </div>
                            <nav aria-label="Page navigation" style="text-align: right">
                                <ul class="pagination ht-pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                       <?php //umer hurrah
                     }
                  }
                  else{
                     if (empty($_GET['sub_category']) && !isset($_GET['page'])) {
                    ?>
                     <div class="col-sm-8 col-md-9 col-lg-9">
                        <div class="product product-grid">
                            <div class="row">
                               <?php
                             $select_random = "SELECT * FROM tbl_item order by rand() limit 10";

                             // $select_random = "SELECT a.* FROM tbl_item a, (SELECT max(item_id)*rand() randid  FROM tbl_item) b  WHERE a.item_id >= b.randid limit 3";
                             $random_result = mysqli_query($connection, $select_random);
                                while($row_random = mysqli_fetch_assoc($random_result)) {

                                    $item_id     = trim($row_random['item_id']) + 2323;
                                    $item_name   = trim($row_random['item_name']);
                                    $item_price  = trim($row_random['item_price']);
                                    $item_image  = trim($row_random['item_image']); 
                                    ?>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <!-- Product item -->
                                        <div class="product-item">
                                            <a href="item.php?item_details=<?php echo $item_id?>" class="product-img"><img src=<?php echo "admin/ITEM_IMAGES/".$item_image ?> alt="image"></a>
                                            <div class="product-caption">
                                                <h4 class="product-name"><a href="item.php?item_details=<?php echo $item_id?>"> <?php echo $item_name ?></a></h4>
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
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                   }
                             ?> 
                        </div>
                    </div>
                    <?php
                   }
                   ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
