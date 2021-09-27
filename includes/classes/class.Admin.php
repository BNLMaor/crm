<?php
    class Admin
    {
        private $bnl;
        static private $single = false;

        private function __construct(Core $bnl)
        {

        }

        public function getTranslationsById($id){
            global $bnl;
            return $bnl->DB->get("translations",array("language_id"=>"?"),array("limit"=>1),array($id));
        }

        public function getFormByUniqueId($id){
            global $bnl;
            return $bnl->DB->get("forms",array("unique_id"=>"?"),array("limit"=>1),array($id));
        }

 

        

  
      
        
        public static function load(Core $bnl)
        {
            if (self::$single === false) self::$single = new self($bnl);
            return self::$single;
        }
        
    }
?>