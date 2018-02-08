<?php include "includes/header.php"; ?>

<div id="wrap-body" class="p-t-lg-30">
    <div class="container">
        <div class="wrap-body-inner">
            <!-- Product details -->
            <section class="m-t-lg-30 m-t-xs-0">
                <div class="row">
                    <div class="col-sm-4 col-md-3 col-lg-3">
                        <!-- Caterory -->
                        <?php include "includes/sidebar.php"; ?>

                    </div>
                    <div class="col-sm-8 col-md-9 col-lg-9">
                        <div class="product-list product_detail p-lg-30 p-xs-15 bg-gray-fa bg1-gray-15 m-b-lg-50">
                            <?php
                            $item_id = htmlentities($_GET['item_details']);
                            //$sub_cat_id = base64_decode($sub_cat_id);
                            $item_id       = $item_id - 2323;
                            $select_random = "SELECT * FROM tbl_item WHERE item_id = $item_id";
                            $random_result = mysqli_query($connection, $select_random);
                            $row_random    = mysqli_fetch_assoc($random_result);

                            $item_id              = trim($row_random['item_id']);
                            $item_name            = trim($row_random['item_name']);
                            $item_price           = trim($row_random['item_price']);
                            $item_image           = trim($row_random['item_image']);
                            $item_description_sh  = trim($row_random['item_description_sh']);
                            $item_description_lg  = trim($row_random['item_description_lg']);
                            ?>
                            <div class="row">
                                <!-- Image Large "http://placehold.it/320x320"-->
                                <div class="image-zoom col-md-6 col-lg-6">
                                    <div class="product-img-lg p-lg-10 m-b-xs-30 text-center">
                                        <a href=<?php echo "admin/ITEM_IMAGES/".$item_image?> >

                                            <img src=<?php echo "admin/ITEM_IMAGES/".$item_image?> alt="image">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <!-- Product description -->
                                    <h3 class="product-name"><?php echo $item_name?></h3>
                                    <div class="product_para">
                                        <ul class="rating pull-left m-r-lg-20">
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <p class="price p-t-lg-20 p-b-lg-10 f-30 f-bold color-red">Rs. <?php echo $item_price ?></p>
                                        <p><?php echo $item_description_sh ?></p>
                                        <hr/>
                                        <p><b>Brand :</b>More Quality</p>
                                        <p><b>Manufactor :</b>Jammu </p>
                                        <p><b>Availability :</b><strong class="color-green color1-green">Instock</strong> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product description tabs -->
                        <div class="product-description m-b-lg-50">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs ht-tabs text-left p-l-lg-30" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Review</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content bg-gray-fa bg1-gray-15 p-lg-30 p-xs-15">
                                <!-- Tab panes item -->
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="txt">
                                        <p><?php echo $item_description_lg; ?>
                                            </p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">This feature will be available in next version of KashmiriMart.</div>
                            </div>
                        </div>
                        <!-- Product realted -->
                        <div class="product product-grid car m-b-lg-15">
                            <div class="heading">
                                <h3>RELATED PRODUCTS</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <!-- Product item -->
                                    <div class="product-item">
                                        <a href="#" class="product-img"><img src="http://placehold.it/320x320" alt="image"></a>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="#">Ground Nuts</a></h4>
                                            <ul class="rating">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <div class="product-price-group">
                                                <span class="product-price">Rs.250</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <!-- Product item -->
                                    <div class="product-item">
                                        <a href="#" class="product-img"><img src="http://placehold.it/320x320" alt="image"></a>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="#">Ground Nuts</a></h4>
                                            <ul class="rating">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <div class="product-price-group">
                                                <span class="product-price">Rs.250</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <!-- Product item -->
                                    <div class="product-item">
                                        <a href="#" class="product-img"><img src="http://placehold.it/320x320" alt="image"></a>
                                        <div class="product-caption">
                                            <h4 class="product-name"><a href="#">Ground Nuts</a></h4>
                                            <ul class="rating">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <div class="product-price-group">
                                                <span class="product-price">Rs.250</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
