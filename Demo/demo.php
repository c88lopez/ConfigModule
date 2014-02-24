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

require_once realpath('..' . DIRECTORY_SEPARATOR . 'Bootstrap' . DIRECTORY_SEPARATOR . 'bootstrap.php');

$oCH = new \Src\ConfigHandler;

$mValues = $oCH->setConfigFilePath(array(
    'Config', 'test.json'
))->getConfigValues();

var_dump($mValues);