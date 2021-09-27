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
        <link href="assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">

      
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
    <body>

        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                  <div class="" id="navbarNav">
                    <ul class="navbar-nav" id="leftNav">

                    </ul>
                    </div>
                    <div class="logo">
                      <a class="navbar-brand" href="index.html"></a>
                    </div>
                    <div class="" id="headerNav">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link search-dropdown" href="#" id="searchDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="search"></i></a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu" aria-labelledby="searchDropDown">
                            <form>
                              <input class="form-control" type="text" placeholder="Type something.." aria-label="Search">
                            </form>
                            <h6 class="dropdown-header">Recent Searches</h6>
                            <a class="dropdown-item" href="#">charts</a>
                            <a class="dropdown-item" href="#">new orders</a>
                            <a class="dropdown-item" href="#">file manager</a>
                            <a class="dropdown-item" href="#">new users</a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link notifications-dropdown" href="#" id="notificationsDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">3</a>
                          <div class="dropdown-menu dropdown-menu-end notif-drop-menu" aria-labelledby="notificationsDropDown">
                            <h6 class="dropdown-header">Notifications</h6>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-info text-white">
                                    <i class="fas fa-bullhorn"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                  <small>19:00</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-primary text-white">
                                    <i class="fas fa-bolt"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                  <small>18:00</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-success text-white">
                                    <i class="fas fa-at"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge">
                                    <img src="../../assets/images/avatars/profile-image.png" alt="">
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge">
                                    <img src="../../assets/images/avatars/profile-image.png" alt="">
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../assets/images/avatars/profile-image.png" alt=""></a>
                          <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i data-feather="inbox"></i>Messages</a>
                            <a class="dropdown-item" href="#"><i data-feather="edit"></i>Activities<span class="badge rounded-pill bg-success">12</span></a>
                            <a class="dropdown-item" href="#"><i data-feather="check-circle"></i>Tasks</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i>Settings</a>
                            <a class="dropdown-item" href="#"><i data-feather="unlock"></i>Lock</a>
                            <a class="dropdown-item" href="#"><i data-feather="log-out"></i>Logout</a>
                          </div>
                        </li>
                      </ul>
                  </div>
                </nav>
            </div>
            <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                  <li class="sidebar-title">
                    ראשי
                  </li>
                  <li class="active-page">
                    <a href="<?=$url?>"><i data-feather="home"></i>  לוח הבקרה</a>
                  </li>
                  <li class="sidebar-title">
                    לידים
                  </li>
      
          
                  <li>
                    <a href="leads"><i class="fas fa-network-wired"></i>  <?=$bnl->Lang->T("leads-menu");?></a>
                  </li><li>
                    <a href="websites"><i class="fas fa-globe"></i>  <?=$bnl->Lang->T("websites-menu");?></a>
                  </li>
                  <li>
                    <a href="index.html"><i class="fas fa-store"></i>  <?=$bnl->Lang->T("orders-menu");?><i style="float:left;" class="fas fa-chevron-left dropdown-icon"></i></a>
                    <ul class="">
                      <li><a href="orders/manage"><i class="far fa-circle"></i><?=$bnl->Lang->T("orders-manage-menu");?></a></li>
                      <li><a href="orders/statics"><i class="far fa-circle"></i><?=$bnl->Lang->T("orders-statics-menu");?></a></li>
                    </ul>
                  </li>
				  <li>
                    <a href="user/actions"><i class="far fa-list-alt"></i></i>  <?=$bnl->Lang->T("recent-actions-menu");?></a>
                  </li>
				  <li>
                    <a href="user/settings"><i class="fas fa-cog"></i>  <?=$bnl->Lang->T("user-settings-menu");?></a>
                  </li>
                  
                 <li class="sidebar-title">
                    מנהל
                  </li>
				  <li>
                    <a href="admin/users-manage"><i class="fas fa-users-cog"></i>  <?=$bnl->Lang->T("clients-manage-amenu");?></a>
                  </li>
				  <li>
                    <a href="admin/packages-manage"><i class="fas fa-archive"></i>  <?=$bnl->Lang->T("package-manage-amenu");?></a>
                  </li>
				  <li>
                    <a href="admin/whatsapp-manage"><i class="fab fa-whatsapp"></i>  <?=$bnl->Lang->T("whatsapp-manage-amenu");?></a>
                  </li>
				  <li>
                    <a href="admin/languages"><i class="fas fa-language"></i>  <?=$bnl->Lang->T("languages-amenu");?></a>
                  </li>
				  <li>
                    <a href="admin/website-settings"><i class="fas fa-cog"></i>  <?=$bnl->Lang->T("site-settings-amenu");?></a>
                  </li>
            
                </ul>
            </div>
