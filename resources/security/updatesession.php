<?php 

$sessionExp = time() + (60 * 60); //Session expires in 1 hour
$jwtmanager->updateExpiration($sessionExp);

$token = $jwtmanager->encodePayload();
setcookie('X-Auth-Token', $token, $sessionExp, '/');

?>