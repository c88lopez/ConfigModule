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

namespace Test\Src\ConfigAdapters;

/**
 * Class IniTest
 * Test the Ini adapter
 *
 * @package Test\Src\ConfigAdapters
 */
class IniTest extends \PHPUnit_Framework_TestCase
{
    protected $oI;

    public function setUp()
    {
        $sIniPath = realpath(
            dirname(dirname(dirname(dirname(__FILE__)))) . DS . 'demo' . DS . 'config' . DS . 'test.ini'
        );

        $this->oI = new \ConfigModule\Adapters\Ini($sIniPath);
    }

    /**
     * Testing get the values as array
     */
    public function testGetValuesArray()
    {
        $aValues = $this->oI->getValues(false);

        $this->assertTrue('ini' == $aValues['file']);
    }

    /**
     * Testing get the values as object
     */
    public function testGetValuesObject()
    {
        $oValues = $this->oI->getValues(true);

        $this->assertTrue('ini' == $oValues->file);
    }
}
 