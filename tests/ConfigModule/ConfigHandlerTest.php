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
        $this->iCH = new \Src\ConfigHandler;
    }

    public function provider()
    {
        return array(
            array(
                array('Demo', 'Config', 'test.ini'), false
            ),
            array(
                array('Demo', 'Config', 'test.json'), false
            ),
            array(
                array('Demo', 'Config', 'test.ini'), true
            ),
            array(
                array('Demo', 'Config', 'test.json'), true
            ),
        );
    }

    public function testGetAsObject()
    {
        $oResult = $this->iCH->getAsObject();

        $this->assertTrue($oResult instanceof \Src\ConfigHandler);
    }

    /**
     * @expectedException \Exception
     */
    public function testSetConfigEmptyFilePath()
    {
        $this->iCH->setConfigFilePath(array('qwe', 'asd.zxc'));
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

        $this->assertTrue($oResult instanceof \Src\ConfigHandler);

        $mData = $oResult->getConfigValues($b);
        if ($b) {
            $this->assertTrue('qwe' == $mData->param1);
        } else {
            $this->assertTrue('qwe' == $mData['param1']);
        }
    }

}
 