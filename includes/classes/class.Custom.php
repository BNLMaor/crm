<?php
    class Custom
    {
        private $bnl;
        static private $single = false;

        private function __construct(Core $bnl)
        {

        }


        

        public function isVaildURL($url){
			return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
		}
        

        public function reload() {
            echo "<script>location.reload();</script>";
        }

        public function moveTo($url,$time=false) {
			if($time == false){
				return header('Location: '.$url.'');
			}else{
				$time = $time * 1000;
				return "<script>window.setTimeout(function() {window.location = '{$url}';}, '$time');</script>";
			}
		}
		public function msg($text,$type = false){
			if ($type == true){
				return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
			}else {
				return '<div class="alert alert-danger"><i class="fa fa-times"></i> '.$text.'</div>';
			}	
		}
		public function protect($string){
			$protection = htmlspecialchars(trim($string), ENT_QUOTES);
			return $protection;	
		}

        function Unique($length_of_string)
        {
         
            // String of all alphanumeric character
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         
            // Shuffle the $str_result and returns substring
            // of specified length
            return substr(str_shuffle($str_result),
                               0, $length_of_string);
        }

        public function get_user_id_by_email ($email) {
            return ($GLOBALS['link']->query("SELECT `id` FROM `users` WHERE `email` = '{$email}'"))->fetch()['id'];
        }

        public function logout () {
            setcookie('login_hash', "", time() -10000, '/');
            $_SESSION['user_id'] = 0;
        }

        public function token_generator () {
            $token = md5(time() + rand(0, 9999));
            $_SESSION['csrf_token'] = $token;
            return $token;
        }

        public function role_hebrew ($role) {
            switch ($role) {
                case 'owner':
                    return 'בעלים';
                case 'manager':
                    return 'מנהל';
                default:
                    return $role;
            }
        }
        public function inc($route){
            if (!file_exists(ROOT . $route)){
                return exit ("file not found");
            } else {
               return include ROOT . $route;
            }
        }
        
        public static function load(Core $bnl)
        {
            if (self::$single === false) self::$single = new self($bnl);
            return self::$single;
        }
        
    }
?>