<?php
    if (!is_logged()) {
        $email_exists = false;
        $fullname_empty = false;

        if (isset($_POST['email'], $_POST['password'], $_POST['fullname'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];

            if (is_email_valid($email)) {
                if (!email_exists($email)) {
                    if (!empty($fullname)) {
                        if (!empty($password)) {
                            $password_hashed = passsword_hash($password);

                            // Register
                            $register_prep_stmt = $GLOBALS['link']->prepare("INSERT INTO `users`(`name`, `email`, `password`) VALUES (?, ?, ?)");
                            $register_prep_stmt->execute([$fullname, $email, $password_hashed]);
                            $new_user_id = $GLOBALS['link']->lastInsertId();

                            // Open Business
                            $open_business_prep_stmt = $GLOBALS['link']->prepare("INSERT INTO `businesses`(`owner_id`, `name`) VALUES (?, ?)");
                            $open_business_prep_stmt->execute([$new_user_id, $fullname]);

                            // Log in
                            $login_hash = hash_generator();
                            $user_id = get_user_id_by_email($email);
                            
                            // Insert login token to DB
                            $GLOBALS['link']->query("INSERT INTO `login_tokens`(`hash`, `user_id`) VALUES ('{$login_hash}', {$user_id})");
                            setcookie('login_hash', $login_hash, time() + 9999999, '/');
                            $_SESSION['user_id'] = $user_id;

                            header("Location: /");
                        } else {
                            $fullname_empty = true;
                        }
                    }
                } else {
                    $email_exists = true;
                }
            }
        }
    } else {
        die();
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login  | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $url; ?>public/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo $url; ?>public/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo $url; ?>public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo $url; ?>public/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>public/css/app-rtl.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>styles/signup.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">הרשמה למערכת!</h5>
                                <p class="text-white-50">הכניסו פרטים וזכרו אותם על מנת להתחבר.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="<?php echo $url; ?>public/images/logo-sm.png" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="form-horizontal mt-4" method="POST">

                                    <div class="form-group">
                                        <label for="email">אימייל</label>
                                        <input type="text" <?php if (isset($_POST['email'])) { echo 'value="' . $_POST['email'] . '"'; } ?> name="email" class="form-control" id="email" placeholder="הכנס כתובת אימייל">
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">שם מלא</label>
                                        <input type="text" <?php if (isset($_POST['fullname'])) { echo 'value="' . $_POST['fullname'] . '"'; } ?> name="fullname" class="form-control" id="fullname" placeholder="שמכם המלא">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">סיסמא</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="הקלד את הסיסמא">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">סיסמא בשנית</label>
                                        <input type="password" name="re_pass" class="form-control" id="userpasswordre" placeholder="הזן סיסמא שנית">
                                    </div>

                                    <div style="margin-top: -10px; margin-bottom: 10px;">
                                        <?php if ($email_exists) : ?>
                                            <small style="color: red">המייל שהזנת קיים במערכת.</small>
                                        <?php endif; ?>

                                        <?php if ($fullname_empty) : ?>
                                            <div>
                                                <small style="color: red">תיבת השם ריקה.</small>
                                            </div>
                                        <?php endif; ?>

                                        <div>
                                            <small id="passes-dont-match" style="display: none; color: red">הסיסמאות שהזנת אינן תואמות.</small>
                                        </div>

                                        <div>
                                            <small id="passes-do-match" style="display: none; color: green">הסיסמאות שהזנת תואמות.</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <button id="signup-btn" class="btn btn-primary w-md waves-effect waves-light" type="submit" disabled>הרשמה</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>כבר רשום? <a href="<?php echo $url; ?>login/" class="font-weight-medium text-primary"> התחבר עכשיו </a> </p>
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo $url; ?>public/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>public/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo $url; ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $url; ?>public/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo $url; ?>public/js/app.js"></script>
    <script src="<?php echo $url; ?>scripts/signup.js"></script>

</body>

</html>