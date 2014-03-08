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

namespace Test\Src;


class ConfigHandlerTest extends \PHPUnit_Framework_TestCase
{
    protected $iCH;

    public function setUp()
    {
        $this->iCH = new \ConfigModule\ConfigHandler;
    }

    public function provider()
    {
        return array(
            array(
                dirname(dirname(dirname(__FILE__))) . DS . 'demo' . DS . 'Config' . DS . 'test.ini', false
            ),
            array(
                dirname(dirname(dirname(__FILE__))) . DS . 'demo' . DS . 'Config' . DS . 'test.json', false
            ),
            array(
                dirname(dirname(dirname(__FILE__))) . DS . 'demo' . DS . 'Config' . DS . 'test.ini', true
            ),
            array(
                dirname(dirname(dirname(__FILE__))) . DS . 'demo' . DS . 'Config' . DS . 'test.json', true
            ),
        );
    }

    public function testGetAsObject()
    {
        $oResult = $this->iCH->getAsObject();

        $this->assertTrue($oResult instanceof \ConfigModule\ConfigHandler);
    }

    /**
     * @expectedException \Exception
     */
    public function testSetConfigEmptyFilePath()
    {
        $this->iCH->setConfigFilePath('asd');
    }

    /**
     * @dataProvider provider
     */
    public function testSetConfigFilePathAndGetValues($a, $b)
    {
        $oResult = $this->iCH->setConfigFilePath($a);

        if ($b) {
            $oResult->getAsObject();
        }

        $this->assertTrue($oResult instanceof \ConfigModule\ConfigHandler);

        $mData = $oResult->getConfigValues($b);
        if ($b) {
            $this->assertTrue('qwe' == $mData->param1);
        } else {
            $this->assertTrue('qwe' == $mData['param1']);
        }
    }

}
 