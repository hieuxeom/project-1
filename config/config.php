<?php
define('DB_HOST', "103.221.221.104");
define('DB_NAME', "kdjxkbin_pro1014");
define('DB_USER', "kdjxkbin_admin");
define('DB_PASS', "Hieuxeom@123");
define('MAIL_ID', "hieutn.bedev@gmail.com");
define('MAIL_PASSWORD', "mgkb ftcy hdrs bidi");
define('STORE_NAME', "ShopBake");

$server = 1;

if ($server == 1) {
    define('BASEPATH', "http://localhost/project-1");
} else if ($server == 2) {
    define('BASEPATH', "https://project.hieutn.xyz");
}
