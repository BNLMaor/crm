
<?php 

    switch($bnl->Route->where("admin")) {
        case "languages":
            include_once ROOT . "sources/views/admin/languages.php";
        break;
        case "translations":
            include_once ROOT . "sources/views/admin/translations.php";
        break;
        default:
            include_once ROOT . "sources/views/dashboard/dashboard.php";
        break;

    }

?>
 