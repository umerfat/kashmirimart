<?php include "admin/database.php"; ?>
<?php include "admin/functions.php";?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KashmiriMart is your own Mart where in you can search for any item which is purely from kashmir. We mostly deal with Kashmiri dryfruits, all varieties of Kashmiri Saffron, Kashmiri Apples, Hand made kashmiri Shawls, Pure Kashmiri Honey and many more">
    <meta name="keywords" content="KashmiriMart, Dryfruits, Saffron, Kashmir, Kashmiri Shawls, Kashmiri Apples">
    <meta name="author" content="Umer Hurrah">
    <title>KashmiriMart</title>
    <link rel="icon" href="">
     <link rel="shortcut icon" href="images/KashmiriMart.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800,900" rel="stylesheet">
    <!-- JqueryUI -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.min.css">
    <!-- Awesome font icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">">
    <!--magnific popup-->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup/magnific-popup.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/sliders.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Padding / Margin -->
    <link rel="stylesheet" type="text/css" href="css/padd-mr.css">
    <!-- light version-->
    <link id="vers" rel="stylesheet" type="text/css" href="css/light-version.css">
    <!-- Boxed-->
</head>

<body>
<div id="wrap" class="color1-inher">
<!-- Header -->
<header id="wrap-header" class="color-inher">
    <div class="menu-bg">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-3 col-lg-3">
                    <a href="index.php" class="logo">
                        <!-- <span>KashmiriMart</span> -->
                        <img src="images/logo2.png" alt="logo">
                    </a>
                </div>
                <div class="col-md-9 col-lg-9">
                    <div class="clearfix"></div>
                    <!-- Menu -->
                    <div class="main-menu">
                        <div class="container1">
                            <nav class="navbar navbar-default menu">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                                                aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- Search -->
                            <div class="search-box">
                                <i class="fa fa-search"></i>
                                <form method="POST" name="search_form" action="search.php#redirect">
                                    <input type="text" name="search_item" placeholder="Search..." class="search-txt form-item">
                                    <button type="submit" name="submit_search" class="search-btn btn-1"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
