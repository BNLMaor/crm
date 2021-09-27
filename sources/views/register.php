<?php
    // if (!is_logged()) {
    //     $wrong_dets = false;
    //     $email_doesnt_exists = false;

    //     if (isset($_POST['email'], $_POST['password'])) {
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];

    //         if (is_email_valid($email)) {
    //             if (email_exists($email)) {
    //                 if (user_login_verify($email, $password)) {
    //                     // Logged

    //                     $login_hash = hash_generator();
    //                     $user_id = get_user_id_by_email($email);
                        
    //                     // Insert login token to DB
    //                     $GLOBALS['link']->query("INSERT INTO `login_tokens`(`hash`, `user_id`) VALUES ('{$login_hash}', {$user_id})");
    //                     setcookie('login_hash', $login_hash, time() + 9999999, '/');
    //                     $_SESSION['user_id'] = $user_id;

    //                     header("Location: /");
    //                 } else {
    //                     $wrong_dets = true;
    //                 }
    //             } else {
    //                 $email_doesnt_exists = true;
    //             }
    //         }
    //     }
    // } else {
    //     die();
    // }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title><?=$settings['sitename']?> - <?=$this->title?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="<?=$url?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=$url?>assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="<?=$url?>assets/plugins/waves/waves.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="<?=$url?>assets/css/alpha.min.css" rel="stylesheet">
        <link href="<?=$url?>assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page sign-in">
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">טוען...</span>
            </div>
        </div>
        
        <div class="alpha-app">
            <div class="container">
                <div class="login-container">
                    <div class="row justify-content-center row align-items-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="card login-box">
                                <form method="post" role="ajax" data-ajax="register">
                                <div class="response"></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">שם מלא</label>
                                        <input type="text" class="form-control" name="fullname" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">כתובת דוא"ל</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" name="gender" style="display: none;">מגדר</label>
                                            <select class="form-control custom-select" id="exampleFormControlSelect1">
                                                <option value="">בחר/י מגדר</option>
                                                <option value="m">זכר</option>
                                                <option value="female">נקבה</option>
                                        
                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label for="password">סיסמא</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword">אימות סיסמא</label>
                                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                    </div>
                                    <button class="btn btn-primary float-right" type="submit">הרשמה</button>
                                    <a href="<?=$url?>login" class="btn btn-text-secondary float-right m-r-sm">התחברות</a>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src="<?=$url?>assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="<?=$url?>assets/plugins/bootstrap/popper.min.js"></script>
        <script src="<?=$url?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=$url?>scripts/main.js"></script>
        <script src="<?=$url?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?=$url?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?=$url?>assets/js/alpha.min.js"></script>
    </body>
</html>