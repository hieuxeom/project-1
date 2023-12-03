<?php
define('DB_HOST', "");
define('DB_NAME', "");
define('DB_USER', "");
define('DB_PASS', "");
define('MAIL_ID', "");
define('MAIL_PASSWORD', "");
define('STORE_NAME', "");

$server = 1;

if ($server == 1) {
    define('BASEPATH', "http://localhost/project-1");
} else if ($server == 2) {
    define('BASEPATH', "https://project.hieutn.xyz");
}
