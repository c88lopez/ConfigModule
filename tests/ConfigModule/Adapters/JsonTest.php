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


class JsonTest extends \PHPUnit_Framework_TestCase
{
    protected $oJ;

    public function setUp()
    {
        $sJsonPath = realpath(
            dirname(dirname(dirname(dirname(__FILE__)))) . DS . 'demo' . DS . 'Config' . DS . 'test.json'
        );

        $this->oJ = new \ConfigModule\Adapters\Json($sJsonPath);
    }

    public function testGetValuesArray()
    {
        $aValues = $this->oJ->getValues(false);

        $this->assertTrue('json' == $aValues['file']);
    }

    public function testGetValuesObject()
    {
        $oValues = $this->oJ->getValues(true);

        $this->assertTrue('json' == $oValues->file);
    }
}
 