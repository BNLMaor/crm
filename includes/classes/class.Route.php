<?php
class Route
{
    private $bnl;
    static private $single = false;

    public $uri;
    public $current = 'index';
    public $params = [];
    public $title = '';

    public function __construct(Core $bnl)
    {
        $this->uri = preg_replace("/(^\/|\/$)/", "", $_SERVER['REQUEST_URI']);
        $this->params = explode("/", $this->uri);
        if ($this->params[0] != '' AND $this->params[0] != 'index') 
            $this->current = $this->params[0];

    }
   
    public function runApp($pages)
    {
        global $bnl;
        global $settings;
        $this->bnl = $bnl;
        $this->premission = "guest";

        if (!is_array($pages))
            exit ("Pages are not in array.");
        
        // Load settings
        $settings = [];
		$stmt = $this->bnl->DB->get("settings");
        foreach ($stmt as $row) {
            $settings[$row['name']] = $row['value'];
		}

        // Ajax Initiallizing
        if($this->current != "ajax") {
            

        // Not Found check.
        $notFound = false;
        if ($this->current != 'index' AND !file_exists(ROOT . "sources/views/" . $this->current . ".php"))
        {
            $notFound = true;
            include ROOT . "sources/views/404.php";
            exit();
        }

        //Check Authurize
        $bnl->AccessManager->BlockUnlessAuthurize($this->current, $pages[$this->current]['permissions']);
                
        // Set title
        if (!empty($pages[$this->current]['title'])) $this->title = $pages[$this->current]['title'];


        // Check if logged
        if($this->bnl->User->isLogged()) {     
            $user = $bnl->User->get_user_row_by_id($_SESSION['user_id']);

            if (isset($pages[$this->current]['header']) AND $pages[$this->current]['header'] == true)
                include_once ROOT . "sources/views/header.php";


                if ($this->current != 'index'){
                    include_once ROOT . "sources/views/" . $this->current . ".php";
                }  else {
                    include_once ROOT . "sources/views/dashboard/dashboard.php";
                }
            
            
            if (isset($pages[$this->current]['footer']) AND $pages[$this->current]['footer'] == true)
                include_once ROOT . "sources/views/footer.php";
        } else {
           switch ($this->current) {
               case "login":
                    include_once ROOT . "sources/views/login.php";
                    break;
                case "register":
                    include_once ROOT . "sources/views/register.php";

                break;
                default:
                    include_once ROOT . "sources/views/login.php";
                break;
           }
        }
    } else {
        include_once ROOT . "sources/requests/ajax.php";
    }
    }
    public function where($str)
    {
        $pos = array_search($str, $this->params);
        if ($pos !== false)
        {
            return (empty($this->params[$pos + 1]) ? '': $this->params[$pos + 1]);
        }
        else
        {
            return false;
        }
    }
    public static function load(Core $bnl)
    {
        if (self::$single === false) self::$single = new self($bnl);
        return self::$single;
    }
}
?>