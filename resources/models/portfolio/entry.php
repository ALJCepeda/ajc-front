<?php

namespace Model\Portfolio;

class Entry {
	public $title = "";
	public $selImage = "";
	public $selQuestion = 0;
	public $images = [];
	public $questions = [];

	function __construct($title) {
		$this->title = $title;
	}

	public function image() {
		return $this->images[$this->selImage];
	}

	public function question() {
		return $this->questions[$this->selQuestion];
	}

	public function selectImage($name) {
		if(isset($this->images[$name]) === TRUE) {
			$this->selImage = $name;
		}
	}

	public function selectQuestion($index) {
		if($index < count($this->questions)) {
			$this->selQuestion = intval($index);
		}
	}

	public function addQuestion($question, $answer) {
		$this->questions[] = [ "Q" => $question, "A" => $answer ];
	}

	public function addImage($name, $location) {
		$this->images[$name] = $location;
	}
}
