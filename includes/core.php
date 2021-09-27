<?php
	session_start();
	ob_start();

	class Core
	{
		private $loadedClasses = [];
		public $Route;
		public $DB;
		public $Custom;
		public $User;
		private static $instance = false;

		public function __construct()
		{
			$initClasses = ["Database", "Route", "Custom", "User","Accessmanager","Language","Admin","Imap"];
			foreach ($initClasses as $class)
			{
				$func = "init" . ucfirst($class);
				$this->$func($class);
			}
		}
		static public function initAll()
		{
			if (self::$instance === false)
				self::$instance = new self();
			return self::$instance;
		}
		private function initRoute($name)
		{
			include_once "classes/class.Route.php";
			$this->Route = $name::load($this);
			$this->loadedClasses[] = "route";
		}
		private function initDatabase($name)
		{
			include_once "classes/class.Database.php";
			$this->DB = $name::load($this);
			$this->loadedClasses[] = "database";
		}
		private function initCustom($name)
		{
			include_once "classes/class.Custom.php";
			$this->Custom = $name::load($this);
			$this->loadedClasses[] = "custom";
		}
		private function initUser($name)
		{
			include_once "classes/class.User.php";
			$this->User = $name::load($this);
			$this->loadedClasses[] = "user";
		}
		private function initAccessmanager($name)
		{
			include_once "classes/class.Accessmanager.php";
			$this->AccessManager = $name::load($this);
			$this->loadedClasses[] = "accessmanager";
		}
		private function initLanguage($name)
		{
			include_once "classes/class.Language.php";
			$this->Lang = $name::load($this);
			$this->loadedClasses[] = "language";
		}
		private function initAdmin($name)
		{
			include_once "classes/class.Admin.php";
			$this->Admin = $name::load($this);
			$this->loadedClasses[] = "admin";
		}

		private function initImap($name)
		{
			include_once "classes/class.Imap.php";
			$this->Imap = $name::load($this);
			$this->loadedClasses[] = "imap";
		}
	}
	

    // Defines Template
	define("TEMPLATE", ROOT."/sources/views/");
	


?>