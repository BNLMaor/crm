<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	if(isset($_GET['type'])){
		$type = $_GET['type'];
		if(!$this->bnl->User->isLogged()){	
		if ($type == "sign-in") {
				if (!$bnl->User->isLogged()) {
					$wrong_dets = false;
					$email_doesnt_exists = false;
			
					if (isset($_POST['email'], $_POST['password'])) {
						$email = $_POST['email'];
						$password = $_POST['password'];
						if ($bnl->User->is_email_valid($email)) {
							if ($bnl->User->email_exists($email)) {
								 if ($bnl->User->user_login_verify($email, $password)) {
								//	 Logged
			
								 	$login_hash = $bnl->User->hash_generator();
								 	$user_id = $bnl->User->get_user_id_by_email($email);
								 	// Insert login token to DB
									$insert = $bnl->DB->insert("login_tokens",array(":hash" => $login_hash,":user_id" => $user_id));
									setcookie('login_hash', $login_hash, time() + 9999999, '/');
								 	$_SESSION['user_id'] = $user_id;
									
								 	echo $bnl->Custom->msg("התחברת בהצלחה, הנך מועבר...",true);
								 	echo $bnl->Custom->moveTo("/",1.2);
									 } else {
								 	echo $bnl->Custom->msg("שם משתמש או סיסמא אינם נכונים.");
								 }
							} else {
								echo $this->bnl->Custom->msg('כתובת הדוא"ל אינה קיימת במערכת.');

							}
						}
					}
				} else {
					die();
				}

			} elseif($type == "register"){
				// var_dump($_POST);
				if (isset($_POST['email'], $_POST['password'], $_POST['fullname'])) {
					$email = $bnl->Custom->protect($_POST['email']);
					$password = $bnl->Custom->protect($_POST['password']);
					$fullname = $bnl->Custom->protect($_POST['fullname']);
			
		
					if ($bnl->User->is_email_valid($email)) {

						if (!$bnl->User->email_exists($email)) {
							if (!empty($fullname)) {
								if (!empty($password)) {
									$password_hashed = $bnl->User->passsword_hash($password);
									// Register
									 $insert = $bnl->DB->insert("users",array(":name" => $fullname,":email" => $email,":password" => $password_hashed,":role" => "manager"));
									// $insert = $bnl->DB->insert("login_tokens",array(":hash" => $login_hash,":user_id" => $user_id));
									var_dump($insert);
								//	$insert = $bnl->DB->insert("users",array(":name" => "1",":user_id" => "2"));

									// $new_user_id = $GLOBALS['link']->lastInsertId();

									// // Open Business
									// $open_business_prep_stmt = $GLOBALS['link']->prepare("INSERT INTO `businesses`(`owner_id`, `name`) VALUES (?, ?)");
									// $open_business_prep_stmt->execute([$new_user_id, $fullname]);
		
									// Log in
									// $login_hash = $bnl->User->hash_generator();
									// $user_id = $bnl->User->get_user_id_by_email($email);
									
									// // Insert login token to DB
									// $insert = $bnl->DB->insert("login_tokens",array(":hash" => $login_hash,":user_id" => $user_id));
									// setcookie('login_hash', $login_hash, time() + 9999999, '/');
									// $_SESSION['user_id'] = $user_id;
									echo $bnl->Custom->msg("אנא מלא את השדות כראוי",true);
									//header("Location: /");
								} else {
									echo $bnl->Custom->msg("אנא מלא את השדות כראוי");
								}
							}
						} else {
							echo $bnl->Custom->msg("הכתובת דואל שבחרת קיימת במערכת");
						}
					}
				}
			} 

		}  else {
			$user = $bnl->User->get_user_row_by_id($_SESSION['user_id']);

			if($user['role'] == "admin") {
				if($type == "editTranslation") { 
					if(!isset($_POST['lang'])) die();

					$lang = $bnl->Custom->protect($_POST['lang']);
					$id = $bnl->Custom->protect($_POST['id']);
					$translation = $bnl->Custom->protect($_POST['translation']);

					if(!isset($translation) OR empty($translation)){$bnl->Lang->T("empty-fields-error",true,false);}
					else {
						$update = $bnl->DB->update("translations","",array("id"=>$id),array(":".$lang => $translation));
						if ($update) {$bnl->Lang->T("translation-add-succsesfuly",true,true); $bnl->Custom->reload();}
						else {$bnl->Lang->T("basic-error",true,false);}
					}
				} else if ($type == "addTranslation") {
					if(!isset($_POST['lang'])) die();
					$lang = $bnl->Custom->protect($_POST['lang']);
					$title = $bnl->Custom->protect($_POST['title']);
					$translation = $bnl->Custom->protect($_POST['translation']);
					if(!isset($translation) OR empty($translation)){$bnl->Lang->T("empty-fields-error",true,false);}
					elseif(!isset($title) OR empty($title)){$bnl->Lang->T("empty-fields-error",true,false);}
					elseif ($bnl->Lang->getTranslationByName($title)){$bnl->Lang->T("translation-exists",true,false);}
					else {
						$insert = $bnl->DB->insert("translations",array(":title" => $title,":".$lang => $translation));
						if ($insert) {$bnl->Lang->T("translation-add-succsesfuly",true,true); $bnl->Custom->reload();}
						else {$bnl->Lang->T("basic-error",true,false);}
					}
				}
			}

			if($type == "addNewWebsite") {
				$name = $bnl->Custom->protect($_POST['name']);
				$address = $bnl->Custom->protect($_POST['address']);

				if(!isset($address) OR empty($address)){$bnl->Lang->T("empty-fields-error",true,false);}
				elseif(!isset($name) OR empty($name)){$bnl->Lang->T("empty-fields-error",true,false);}
				elseif(!$bnl->Custom->isVaildURL($address)){$bnl->Lang->T("url-valid-error",true,false);}
				else {
					// TODO : Check exists www.
					$address = parse_url($address, PHP_URL_HOST);
					if($bnl->User->isWebsiteExists($address)) {$bnl->Lang->T("website-exists-error",true,false);}
					else {
						$insert = $bnl->DB->insert("websites",array(":name" => $name,":user_id" => $_SESSION['user_id'],":address" => $address,":timestamp" => time()));
						if ($insert) {$bnl->Lang->T("website-add-succsesfuly",true,true);}
						else {$bnl->Lang->T("basic-error",true,false);}
					}
				}
			} else if ($type == "addNewForm") {
				$web_id = $bnl->Custom->protect($_POST['web_id']);
				$name = $bnl->Custom->protect($_POST['name']);
				$type = $bnl->Custom->protect($_POST['type']);
				$unique = $bnl->Custom->Unique(10);
				if(!isset($web_id) OR empty($web_id)){$bnl->Lang->T("empty-fields-error",true,false);}
				if(!isset($type) OR empty($type)){$bnl->Lang->T("empty-fields-error",true,false);}
				elseif(!isset($name) OR empty($name)){$bnl->Lang->T("empty-fields-error",true,false);}
				elseif($bnl->User->isUniqueExists($unique)) {$bnl->Lang->T("basic-error",true,false);}
				else {
					$insert = $bnl->DB->insert("forms",array(":name" => $name,":unique_id" => $unique,":web_id" => $web_id,":user_id" => $_SESSION['user_id'],":type" => $type,":created_at" => time()));
					if ($insert) {$bnl->Lang->T("form-add-succsesfuly",true,true);}
					else {$bnl->Lang->T("basic-error",true,false);}
				}

			}

		}
	
		
	}
	

 ?>
