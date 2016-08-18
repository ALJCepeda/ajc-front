<?php
class Parametizer {
	public $route = "";
	public $map = [];
	public $parameters = "";


 	function __construct($parameters, $map) {
 		$this->route = $parameters["_route"];
 		$this->map = $map;
 		$this->parameters = $parameters;
 	}

 	public function script() {
		return isset($this->parameters["script"]) ? $this->parameters["script"] : $this->route;
 	}

 	public function title() {
 		return isset($this->parameters['title']) ? $this->parameters['title'] : 'ALJCepeda';
 	}

 	public function notifications() {
 		return isset($this->parameters['notifications']) ? $this->parameters['notifications'] : [];
 	}

 	public function javascripts() {
 		$result = [];

		if(isset($this->parameters['js'])) {
			foreach ($this->parameters['js'] as $script) {
				$result[] = "<script src='$script'></script>";
			} 
		}

		return $result;
 	}

 	public function stylesheets() {
 		$result = [];

 		$route = $this->route;
		$stylesheetURL = "assets/css/pages/$route.css";
		if(file_exists(ROOT . "/public/$stylesheetURL") !== FALSE) {
			$result[] = "<link rel='stylesheet' type='text/css' href='$stylesheetURL'>";
		}
	
		if(isset($this->parameters['css'])) {
			foreach ($this->parameters['css'] as $sheet) {
				$result[] = "<link rel='stylesheet' type='text/css' href='assets/css/$sheet.css'>";
			}
		}

		return $result;
 	}

 	public function requires() {
	 	//Location dependant external dependencies
		$result = [];
		if(isset($this->parameters['require'])) {
			foreach ($this->parameters['require'] as $name) {
				if(isset($this->map[$name]) === TRUE) {
					$url = $this->map[$name];
					$result[] = "<script src='$url'></script>";
				}
			}
		}

		return $result;
 	}
}