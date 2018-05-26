<?php

define("DBMS", "mysql");
define("DB_CHARSET", "utf8");
define("DB_HOST", 'localhost');
define("DB_PORT", '3306');
define("DB_USER", 'root');
define("DB_PASSWORD", 'root');
define("DB_NAME", 'gallery');
//define("DSN", DBMS . ":" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . ":" . DB_PORT . "/" . DB_NAME);
define("DSN", DBMS . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' .DB_CHARSET);
//DBMS . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' .DB_CHARSET;

$dsn = 'mysql:host=your_db_host;dbname=your_db_name;charset=utf8';
