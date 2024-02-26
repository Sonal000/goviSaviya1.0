<?php


// php mailer

require_once '../vendor/autoload.php';

// require '../vendor/PHPMailer/src/Exception.php';
// require '../vendor/PHPMailer/src/PHPMailer.php';
// require '../vendor/PHPMailer/src/SMTP.php';



// load config
require_once 'config/config.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';


// load libraries
 // require_once 'libraries/Controller.php';
 // require_once 'libraries/Core.php';
 // require_once 'libraries/Database.php';


 // auto loader
 spl_autoload_register(function($className){
  require_once 'libraries/'.$className.'.php';
 });

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;