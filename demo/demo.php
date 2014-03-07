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
 * Cargo el autoload e instancio
 */
require_once realpath(
    '..' . DIRECTORY_SEPARATOR .
    '..' . DIRECTORY_SEPARATOR .
    '..' . DIRECTORY_SEPARATOR .
    'autoload.php'
);

$oCH = new \ConfigModule\ConfigHandler;

/**
 * Reviso que no ocurrieron excepciones
 */
try {
    $mValues = $oCH->setConfigFilePath('Config/test.ini')
        ->getAsObject()
        ->getConfigValues();
} catch (\Exception $e) {
    print_r($e->getMessage());
    return false;
}

var_dump($mValues);