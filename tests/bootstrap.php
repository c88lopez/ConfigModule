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

define('DS', DIRECTORY_SEPARATOR);

/**
 * Formas de correr los test
 * 0 => clonado de git y luego 'composer install'
 * 1 => instalado con composer
 */
if (0) {
    require_once realpath(
        '..' . DS .
        '..' . DS .
        'autoload.php'
    );
} else {
    $loader = require __DIR__ . "/../vendor/autoload.php";
    $loader->addPsr4('ConfigModule\\', __DIR__.'/ConfigModule');
}
