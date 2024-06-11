<?php
ob_start();

session_start();

require_once "vendor/autoload.php";

require_once "env.php";

require_once "routes.php";

ob_end_flush();