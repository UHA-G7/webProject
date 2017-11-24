<?php
session_start();
error_reporting(E_STRICT | E_ALL);
date_default_timezone_set('Europe/Paris');
// PROJECT DEFINES =============================================================
define('DS', DIRECTORY_SEPARATOR); 
define('WEBROOT', dirname(__FILE__)); 
define('ROOT', dirname(WEBROOT));
define('CONFIGURATION',ROOT.DS.'configuration');
define('CONTROLLERS', ROOT.DS.'controllers');
define('INCLUDES', ROOT.DS.'includes');
define('MODELS', ROOT.DS.'models');
define('LIBS', ROOT.DS.'libs');
define('VIEWS', ROOT.DS.'views');
define('BATCHS', ROOT.DS.'batchs');
define('MAILS', ROOT.DS.'mails');
define('PRINTS', ROOT.DS.'prints');
define('IMGS',WEBROOT .DS .'images');
define('FILES', WEBROOT.DS.'files');
define('VENDORS', WEBROOT.DS.'vendor');
define('CASPERFILES', ROOT.DS.'casperjs');
//define('INSTALL',URL_BASE.DS.'install');

define('URL_BASE', dirname(dirname($_SERVER['SCRIPT_NAME'])));  
define('URL_BASE_WEBSITE', dirname(dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])))));
define('ASSETS', URL_BASE.'/assets/');
define('IMG', ASSETS.'/img');
define('CSS', ASSETS.'/css');
define('JS', ASSETS.'/js');


// REQUIRE =====================================================================
set_include_path(get_include_path() . PATH_SEPARATOR . LIBS);
require_once LIBS.DS.'Configuration.php';
require_once LIBS.DS.'Dispatcher.php';
include MODELS.DS.'modelFaculte.php';
include MODELS.DS.'modelFormation.php';
include MODELS.DS.'modelMatiere.php';
include MODELS.DS.'modelVacataire.php';
include MODELS.DS.'modelRespFormation.php';
include MODELS.DS.'modelRespAdministratif.php';
include MODELS.DS.'modelContGestion.php';
include MODELS.DS.'modelRespFinancier.php';

if(file_exists(ROOT.DS.'configuration'.DS.'conf.ini')){
  $dipatcher = new Dispatcher();
}else{
  $dipatcher = new Dispatcher(true);
}
