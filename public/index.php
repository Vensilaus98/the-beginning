<?php

//Autoload classes
require_once '../vendor/autoload.php';

//Require the configuration file.
require_once '../config/config.php';

//Define app costants
define('APP_NAME','the-beginning');

//App Root
define('APP_ROOT',dirname(dirname(__FILE__)));
define('URL_ROOT','/');
define('URL_SUBFOLDER','');

//Database connection details
define('DB_HOST','');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASSWORD','');

?>