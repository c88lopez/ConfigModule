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
 * Class NullTest
 * Test the Null adapter
 *
 * @package Test\Src\ConfigAdapters
 */
class NullTest extends \PHPUnit_Framework_TestCase
{
    protected $oN;

    public function setUp()
    {
        $this->oN = new \ConfigModule\Adapters\Null;
    }

    public function provider()
    {
        return array(
            array('1'),
            array('false'),
            array(true),
            array(false),
            array(new \stdClass()),
            array(12),
        );
    }

    /**
     * Testing null object returning an empty array
     * @dataProvider provider
     */
    public function testNullAdapter($a)
    {
        $aResult = $this->oN->getValues($a);
        $this->assertTrue(empty($aResult));
    }
}
 