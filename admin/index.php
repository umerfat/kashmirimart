<?php include "database.php";?>
<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body class="login" style="background-image:url(USER_IMAGES/login_bg.jpg");">
<div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
    <?php 
    if (isset($_POST['user_login'])) {
        login_user();
    }
    ?>
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST">
                    <h1>Admin Login</h1>
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="on" required>
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-default submit" name="user_login">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <p>©2016 All Rights Reserved. DryfruitShop. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
