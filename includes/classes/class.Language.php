<?php
    class Language
    {
        private $bnl;
        static private $single = false;
        public $lang = "he";

        private function __construct(Core $bnl)
        {
 
        } 

        public function T($text,$msg= false, $success=false) {
            global $bnl;

             $get_translation = $bnl->DB->get("translations",array("title"=>"?"),array("limit"=>1),array($text));
            
             if($get_translation) {
                $t =  $get_translation[$this->lang];
             } else {
                 $t =  $text;
             }
             if($msg) { 
                 $type = ($success) ? "success" : "danger";
                echo '<div class="alert alert-'.$type.'"><i class="fa fa-check"></i> '.$t.'</div>';
             } else {
                 echo $t;
             }

        }

        public function getLangByName($name) {
            global $bnl;
            $get_lang = $bnl->DB->get("languages",array("language"=>"?"),array("limit"=>1),array($name));
            if($get_lang) {
                return $get_lang['id'];
            } else {
                return false;
            }
        }

        public function getTranslationById($id){ 
            global $bnl;
            return $bnl->DB->get("translations",array("id"=>"?"),array("limit"=>1),array($id));
        }

        
        public function getTranslationByName($name){ 
            global $bnl;
            return $bnl->DB->get("translations",array("title"=>"?"),array("limit"=>1),array($name));
        }


        

  
      
        
        public static function load(Core $bnl)
        {
            if (self::$single === false) self::$single = new self($bnl);
            return self::$single;
        }
        
    }
?>