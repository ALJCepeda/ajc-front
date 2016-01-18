<?php
require "constants.php";
require "aljcepeda.php";

define('VENDOR', HOME . '/vendor');

require "misc.php";
require VENDOR . "/autoload.php";
require "resources/security/errorhandler.php";

date_default_timezone_set(TIMEZONE);