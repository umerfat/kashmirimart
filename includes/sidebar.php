
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
            <div class="navbar-collapse collapse sidebar-navbar-collapse"  id="redirect">
                <h4 class="cat-text">Categories</h4>
                <ul class="nav navbar-nav" id="sidenav01">

                     <?php 
                        get_category();
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