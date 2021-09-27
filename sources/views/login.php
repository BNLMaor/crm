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
        <base href="<?= SITE_URL; ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title><?=$settings['sitename']?> - <?=$this->title?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="assets/css/main.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
              <span class='sr-only'>Loading...</span>
            </div>
          </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-4">
                    <div class="card login-box-container">
                        <div class="card-body">
                            <div class="authent-logo">
                                <img src="../../assets/images/logo@2x.png" alt="">
                            </div>
                            <div class="authent-text">
                                <p>ברוך הבא ל<?=$settings['sitename']?></p>
                            </div>

                            <form method="POST" role="ajax" data-ajax="sign-in">
                            <div class="response"></div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput" style="float: right; margin-right: 10px;">כתובת דוא"ל</label>
                                      </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword" style="float: right; margin-right: 10px;">סיסמא</label>
                                      </div>
                                </div>
                  
                                <div class="d-grid">
                                <button type="submit" class="btn btn-info m-b-xs">התחברות</button>
                            </div>
                              </form>
                              <div class="authent-reg">
                                  <p>אין לך חשבון?  <a href="register.html">צור עכשיו</a></p>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="assets/js/main.min.js"></script>
        <script src="scripts/main.js"></script>
    </body>
</html>




