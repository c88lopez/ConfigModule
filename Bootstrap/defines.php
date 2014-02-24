<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Short File Description
 * 
 * PHP version 5
 * 
 * @category   aCategory
 * @package    aPackage
 * @subpackage aSubPackage
 * @author     anAuthor
 * @copyright  2014 a Copyright
 * @license    a License
 * @link       http://www.aLink.com
 */

/**
 * Carga de constantes
 */
define('DS', DIRECTORY_SEPARATOR);
define('PATH_AP', realpath(dirname(dirname(__DIR__))));
define('PATH_AP_APPS', PATH_AP . DS . 'Apps');
define('PATH_AP_CORE', PATH_AP . DS . 'Core');
define('PATH_AP_TEMPLATES', PATH_AP . DS . 'Templates');
define('PATH_AP_VENDOR', PATH_AP . DS . 'Vendor');