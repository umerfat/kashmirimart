<!--<div class="category m-b-lg-50 ">-->
<!--    <div class="heading m-b-lg-0">-->
<!--        <h3 class="p-l-lg-20" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">-->
<!--            <i class="fa fa-bars"></i>Caterory-->
<!--        </h3>-->
<!--    </div>-->
<!--    <ul class="collapse in" id="collapseExample">-->
<!--        <li class="active"><a href="#">Cat 1<i class="fa fa-chevron-right pull-right"></i></a></li>-->
<!--        <li><a href="#">Cat 2<i class="fa fa-chevron-right pull-right"></i></a></li>-->
<!--        <li><a href="#">Cat 3<i class="fa fa-chevron-right pull-right"></i></a></li>-->
<!--        <li><a href="#">Cat 4<i class="fa fa-chevron-right pull-right"></i></a></li>-->
<!--        <li><a href="#">Cat 4<i class="fa fa-chevron-right pull-right"></i></a></li>-->
<!--    </ul>-->
<!--</div>-->





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
                    for ($i=0; $i < 4; $i++) { 
                        ?>
                        <li class="active">
                        <a href="" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">Cat Sub 1 <span class="caret pull-right"></span>
                        </a>
                        <div class="collapse" id="toggleDemo" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="#">Submenu1.1</a></li>
                                <li><a href="#">Submenu1.2</a></li>
                                <li><a href="#">Submenu1.3</a></li>
                            </ul>
                        </div>
                    </li>
                        <?php
                     } 
                    ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">Cat sub 2 <span class="caret pull-right"></span>
                        </a>
                        <div class="collapse" id="toggleDemo2" style="height: 0px;">
                            <ul class="nav nav-list">
                                <li><a href="#">Submenu2.1</a></li>
                                <li><a href="#">Submenu2.2</a></li>
                                <li><a href="#">Submenu2.3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">cat 2</a></li>
                    <li><a href="#">cat 3</a></li>
                    <li><a href="#">cat 4</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>