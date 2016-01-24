<?php
	namespace Model\Other;
	
	class TidBit {
		public $description = "";
		public $command = "";

		function __construct($command, $description) {
			$this->description = $description;
			$this->command = $command;
		}
	}