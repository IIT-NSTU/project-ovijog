<?php

require_once "config/config.php";

require_once "libraries/PHPMailer/PHPMailer.php";
require_once "libraries/PHPMailer/POP3.php";
require_once "libraries/PHPMailer/SMTP.php";
require_once "libraries/PHPMailer/OAuthTokenProvider.php";
require_once "libraries/PHPMailer/OAuth.php";
require_once "libraries/PHPMailer/Exception.php";

require_once "helpers/url_helper.php";
require_once "helpers/session_helper.php";

require_once "libraries/Controller.php";
require_once "libraries/Core.php";
require_once "libraries/Database.php";
require_once 'controllers/ControllerFactory.php';
require_once 'controllers/PagesController.php';
require_once 'controllers/PostsController.php';
require_once 'controllers/UsersController.php';

