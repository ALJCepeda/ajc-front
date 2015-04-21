<?php
include ROOT . '/vendor/firebase/php-jwt/Authentication/JWT.php';

class TokenManager {
	private $secretKey = '';
	private $payload = '';

	function __construct($secretKey){
		$this->secretKey = $secretKey;
	}

	function getPayload(){
		if(empty($this->payload) || !is_array($this->payload)){
			return FALSE;
		}

		return $this->payload;
	}

	function validateNonce(){
		if(empty($this->payload)){
			trigger_error('Payload needs to be set before validating nonce');
			return FALSE;
		}

		if(!isset($_SESSION['nonce'])){
			return TRUE;
		}

		if(!isset($payload['nonce']) || $_SESSION['nonce'] != $payload['nonce']) {
			return FALSE;
		}

		return TRUE;
	}
          
	function encodePayload() {
		$payload = $this->getPayload();
		if(!$payload){
			return FALSE;
		}

		return JWT::encode($payload, $this->secretKey);
	}

	function updateExpiration($sessionExp) {
		$payload = $this->getPayload();
		if(!$payload){
			return FALSE;
		}

		$this->payload['exp'] = $sessionExp;
		return TRUE;
	}

	function createPayload() {
		$payload = [
		    'iss' => DOMAIN,
		    'aud' => DOMAIN,
		    'sub' => 'guest',
		    'iat' => time(),
		    'exp' => time()
		];

		$this->payload = $payload;
		return $this->payload;
	}

	function validateJWT($token){
		try {
			$payload = (array)JWT::decode($token, $this->secretKey, array('HS256'));

			if($payload['exp'] > time()){
				if(FALSE) {
					//Token has expired, if user is logged in, log him out
					//Then return to main page
				}
			}

			$this->payload = $payload;
			return $payload;
		} catch (Exception $e){
			return FALSE;
		}
	}

}

?>