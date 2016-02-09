<?php

namespace Model\Menu;

class Item {
	private $name = "";
	private $path = "";
	private $menu = [];

	function __construct($options) {
		$this->setName($options["name"]);

		if(isset($options["path"]) === true) {
			$this->setPath($options["path"]);
		}

		if(isset($options["submenu"]) === true) {
			foreach ($options["submenu"] as $key => $value) {
				$this->addMenu(new Item(["name"=>$key, "path"=>$value]));
			}
		}
	}

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}

	public function setPath($path) {
		$this->path = $path;
	}
	public function getPath() {
		return $this->path;
	}

	public function getMenu() {
		return $this->menu;
	}
	public function addMenu(Item $menu) {
		$this->menu[] = $menu;
	}

	public function hasMenu() {
		return count($this->menu) > 0;
	}
}