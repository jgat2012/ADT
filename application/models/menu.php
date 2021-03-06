<?php
class Menu extends Doctrine_Record {
	public function setTableDefinition() {
		$this -> hasColumn('Menu_Text', 'varchar', 50);
		$this -> hasColumn('Menu_Url', 'varchar', 100);
		$this -> hasColumn('Description', 'text');
		$this -> hasColumn('Offline', 'varchar',1);
		$this -> hasColumn('active', 'int', 5);
	}

	public function setUp() {
		$this -> setTableName('menu');
	}

	public static function getAllHydrated() {
		$query = Doctrine_Query::create() -> select("Menu_Text, Menu_Url, Description") -> from("Menu");
		$menus = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $menus;
	}
	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("menu");
		$menus = $query -> execute();
		return $menus;
	}
	
	public function getAllActive() {
		$query = Doctrine_Query::create() -> select("*") -> from("menu")->where("active='1'");
		$menus = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $menus;
	}

}
