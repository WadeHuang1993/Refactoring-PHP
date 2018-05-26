<?php

require_once (dirname(__FILE__) . '/../config/database.php');
use Slim\PDO\Database;


$dsn = array(
    'phptype'  => 'mysql',
    'username' => DB_USER,
    'password' => DB_PASSWORD,
    'hostspec' => DB_HOST,
    'database' => DB_NAME,
);

$dsn = 'mysql:host=your_db_host;dbname=your_db_name;charset=utf8';

$db = new Database(DSN, DB_USER, DB_PASSWORD);

