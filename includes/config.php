<?php
  ob_start();
  session_start();
  ini_set('opcache.enable', false);
  ini_set('display_errors', true);

  // Database Configuration
  define("DB_HOST", "localhost");
  define("DB_USER", "crmallsiteco_crm");
  define("DB_PASS", "Daz.PSRxx}UR");
  define("DB_NAME", "crmallsiteco_crm");

  //$GLOBALS['link'] = new PDO("mysql:host=localhost;dbname=".$dbinfo['db'].";charset=utf8", "".$dbinfo['user']."", "".$dbinfo['password']."");
  $GLOBALS['site_url'] = "https://crm.allsite.co.il";

  if (!defined("SITE_URL")) define("SITE_URL", $GLOBALS['site_url']);

  $config = array(
    "timezone" => date_default_timezone_get(),
    "debug" => 1
  );
?>