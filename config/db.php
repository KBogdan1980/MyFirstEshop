<?php

/**
 * Ініціалізація підключення до БД
 * 
 */

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

// з'єднуємось з БД
$db = mysql_connect($dblocation, $dbuser, $dbpasswd);
mysql_set_charset('utf8');

if (! $db) {
    echo 'Помилка доступу до MySQL';
    exit();
}

//Встановлює кодування за умовчанням для поточного з'єднання

if (!mysql_select_db($dbname, $db) ) {
    echo "Помилка доступу до бази даних: {$dbname}";
    exit();
}