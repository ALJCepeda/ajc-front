<?php

namespace Model\Menu;

class Item {
	private $name = "";
	private $path = "";
	private $menu = [];

	function __construct($options) {
		$this->setName($options["name"]);
		$this->setPath($options["path"]);
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