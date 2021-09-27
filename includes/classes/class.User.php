<?php
class User
{
    private $bnl;
    static private $single = false;

    public $uri;
    public $current = 'index';
    public $params = [];
    public $title = '';

    public function __construct(Core $bnl)
    {
        global $bnl;
        $this->bnl = $bnl;

    }
   

    public function isLogged(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0){
            return $_SESSION['user_id'];
        } else {return false;}
    }

    public function getUserId(){
        return $this->isLogged() ? $_SESSION['user_id'] : false;
    }
    public function is_email_valid ($email) {
        //var_dump($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {return false;}
        // return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public function email_exists ($email) {
        global $bnl;
		return $bnl->DB->get("users",array("email"=>"?"),array("limit"=>1),array($email));
    }

    
    public function get_user_id_by_email ($email) {
        global $bnl;
        return $bnl->DB->get("users",array("email"=>"?"),array("limit"=>1),array($email))['id'];

    } 
    public function getFormsByWebsiteId ($id) {
        global $bnl;
        return $bnl->DB->get("forms",array("web_id"=>"?"),array(),array($id));

    }

    public function user_login_verify ($email, $password) {
        global $bnl;
        $user_id = $this->get_user_id_by_email($email);
        $user = $this->get_user_row_by_id($user_id);
        $user_pass_hashed = $user['password'];

        return password_verify($password, $user_pass_hashed);
    }

    public function passsword_hash ($password) {
        return password_hash($password, PASSWORD_BCRYPT, array("cost" => 10));
    }

    public function hash_generator () {
        return md5(time() + rand(0, 9999));
    }
    
    public function get_user_row_by_id ($id){
        global $bnl;
        return $bnl->DB->get("users",array("id"=>"?"),array("limit"=>1),array($id));

    }

    public function getWebsiteById ($id,$user_id){
        global $bnl;
        return $bnl->DB->get("websites",array("id"=>"?","user_id"=>"?"),array("limit"=>1),array($id,$user_id));

    } 
    
    public function getFormById ($id,$user_id){
        global $bnl;
        return $bnl->DB->get("forms",array("unique_id"=>"?","user_id"=>"?"),array("limit"=>1),array($id,$user_id));

    }

    public function isUniqueExists($hash) {
        global $bnl;
        return $bnl->DB->get("forms",array("unique_id"=>"?"),array("limit"=>1),array($hash));
    }

    public function isWebsiteExists($website) {
        global $bnl;
        return $bnl->DB->get("websites",array("address"=>"?"),array("limit"=>1),array($website));
    }
    
    public function countWebsites($id = NULL) {
        global $bnl;
        if($id) {
            return count($bnl->DB->get("websites",array("user_id"=>"?"),array(),array($id)));
        } else {
            return count($bnl->DB->get("websites"));
        }
    }

    public static function load(Core $bnl)
    {
        if (self::$single === false) self::$single = new self($bnl);
        return self::$single;
    }
}
?>