<?php
    class AccessManager
    {
        private $bnl;
        static private $single = false;
        public $default_premissions = ["guest","member","admin","all"];


        private function __construct(Core $bnl)
        {

        }

        public function isValidPremission($premission) {
            if (in_array($premission,$premissions)) {
                return True;
            } else {
                return False;
            }

        }


        public function BlockUnlessAuthurize($page, $premission) {
            global $bnl;
            if (!in_array($premission,$this->default_premissions))
                die("OOPS");
            if ($bnl->User->isLogged()) {
                $user = $bnl->User->get_user_row_by_id($_SESSION['user_id']);
                if($user['role'] == "member") {
                  if(!$premission != "member")
                    die("Access Denied");
                }
                if ($premission == "guest")
                     die("Access Denied");
        
            }  
        }


        

  
      
        
        public static function load(Core $bnl)
        {
            if (self::$single === false) self::$single = new self($bnl);
            return self::$single;
        }
        
    }
?>