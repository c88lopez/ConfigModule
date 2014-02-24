<?php

/**
 * bootstrap.php
 * Archivo que carga las dependencias de la aplicacion
 * 
 * PHP Version 5
 * 
 * @category   AppManager
 * @package    Config
 * @subpackage Bootstrap
 * @author     Cristian Lopez <c88lopez@gmail.com>
 * @license    nolicense No license
 * @link       http://nolink.com
 */

require_once 'defines.php';

/**
 * Se carga el autoload para las clases de la aplicacion
 */
require_once 'autoload.php';
$oSCL = new SplClassLoader();
$oSCL->setIncludePath(realpath('..' . DS));
$oSCL->register();
