<?php
    class Imap
    {
        private $bnl;
        static private $single = false;


        private function __construct(Core $bnl)
        {

        }

        public function connect(){
            /* connect to gmail */
            $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
            $hostname1 = '{imap.gmail.com:993/ssl/novalidate-cert}[Gmail]/All Mail';

            $username = 'daniprime23@gmail.com';
            $password = 'GTAfall123321';
            /* try to connect */
            return imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        }


        public function move($connection,$uid, $folder)
        {
            $tries = 0;
            while ($tries++ < 3) {
                if (imap_mail_move($connection, $uid, $folder, CP_UID)) {
                    imap_expunge($connection);
                    return true;
                } else {
                    sleep(1);
                }
            }
            return false;
        }
        public function parseFields($body) {
            $data = array();
            $body = explode("<br>", $body);
            foreach ($body as $key => $row) {
                if (strpos($row, ':') !== false) {
                    $row = explode(":", $row);
                    $field = $row[0];
                    $value = $row[1]; 
                    $data[$field] = $value;
                } else {
                    return false;
                }
            }
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        
        }

        public function tryToMatch($needles = array(),$haystack,$field) {
            foreach ($needles as $key=>$value){
               // echo "Trying to find :".$value." in ".$haystack;
                if (strpos($haystack, $value) !== false) {
                    return $field;
                } 
            }
            return false;
        }
        public function strposa($haystack, $needles=array(),$value , $offset=0) {
            $chr = array();
            foreach($needles as $needle) {
                    $res = strpos($haystack, $needle, $offset);
                    if ($res !== false) $chr[$needle] = $res;
            }
            if(empty($chr)) return false;
            return $value;
        }
        public function getFields($body) {
            if (strpos($body, '<br><br>---<br><br>') !== false) {
                $body = explode("<br><br>---<br><br>", $body);
                return $body[0];
            } else {
                return false;
            }
        }
        public function getLeadIP($body){
            if (strpos($body, 'Remote IP:') !== false) {
                $body = explode("IP:", $body);
                $body = explode("<br>",$body[1]);
                return $body[0];
            } else {
                return false;
            }
        }
        public function getLeadRef($body){
            if (strpos($body, 'Page URL:') !== false) {
                $body = explode("Page URL:", $body);
                $body = explode("<br>",$body[1]);
                return $body[0];
            } else {
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