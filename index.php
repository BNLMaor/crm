<?php
    if (!defined("ROOT"))
        define("ROOT", __DIR__ . "/");
    
    include("includes/config.php");
    // // include("includes/functions.php");
    ini_set('display_errors', true);
    include("includes/core.php");

    // Auto log by cookie
    /*if (!is_logged() && isset($_COOKIE['login_hash']) && $_COOKIE['login_hash'] != '0') {
        $hash = $_COOKIE['login_hash'];
        echo  $_SESSION['user_id'] = $GLOBALS['link']->query("SELECT `user_id` FROM `login_tokens` WHERE `hash` = '{$hash}'")->fetch()['user_id'];
    }*/

    $bnl = Core::initAll();

    
    $bnl->Route->runApp([
        "ajax" => [
            'permissions' => 'all',
            'header' => false,
            'footer' => false,
            'title' => "ajax"
        ],
   
        "index" => [
            'permissions' => 'member',
            'header' => true,
            'footer' => true,
            'title' => "לוח הבקרה"
        ],
        'login' => [
            'permissions' => 'guest',
            'header' => false,
            'footer' => false,
            'title' => "התחבר"
        ],
        'register' => [
            'permissions' => 'guest',
            'header' => false,
            'footer' => false,
            'title' => "הרשם"
        ],
        'websites' => [
            'permissions' => 'member',
            'header' => true,
            'footer' => true,
            'title' => "אתרים"
        ],
        'admin' => [
            'permissions' => 'admin',
            'header' => true,
            'footer' => true,
            'title' => "אדמין"
        ],
        'cron' => [
            'permissions' => 'all',
            'header' => false,
            'footer' => false,
            'title' => "del"
        ],
        'forms' => [
            'permissions' => 'member',
            'header' => true,
            'footer' => true,
            'title' => "טפסים"
        ]
    ]);
   
?>