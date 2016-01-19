<?php

namespace Model\Other;

class Notification {
	private $status = "";
	private $type = "alert-warning";
	private $dismissable = "alert-dismissable";
	private $message = "";

	function __construct($options) {
		$this->setStatus($options["status"]);
		$this->setMessage($options["message"]);

		if(isset($options["type"])) $this->setType($options["type"]);
		if(isset($options["dismissable"])) $this->setDismissable($options["dismissable"]);
	}

	public function setStatus($status) {
		$this->status = $status;
	}
	public function getStatus() {
		return $this->status;
	}

	public function setType($type) {
		$this->type = $type;
	}
	public function getType() {
		return $this->type;
	}

	public function setDismissable($dismissable) {
		$this->dismissable = $dismissable;
	}
	public function getDismissable() {
		return $this->dismissable;
	}
	public function isDismissable() {
		return isset($this->dismissable);
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}
}
