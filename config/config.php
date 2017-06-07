<?php

/**
 * Файл налаштувань
 * 
 */

//константи для звернення до контролерів
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');



//> Шаблон, що використовується
$template = 'default';

// шляхи до файлів шаблонів (*.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

//шляхи до файлів шаблонів в веб-просторі
define('TemplateWebPath', "templates/{$template}/");
//<

//> Ініціалізація шаблонізатора Smarty
// put full path to Smarty.class.php
require '../library/Smarty/distribution/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/Configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//<