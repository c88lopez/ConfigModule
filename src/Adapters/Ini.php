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

namespace ConfigModule\Adapters;

/**
 * Short Class Description
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
class Ini implements \ConfigModule\Adapters\IBase
{
    /**
     * Properties
     */
    protected $sFilePath;

    /**
     * Methods
     */
    public function __construct($sFilePath)
    {
        $this->sFilePath = $sFilePath;
    }

    public function getValues($bAsObject)
    {
        $aIniValues = parse_ini_file($this->sFilePath);

        $mValues = $aIniValues;
        if ($bAsObject) {
            $mValues = new \stdClass();
            foreach ($aIniValues as $sIndex => $sValue) {
                $mValues->$sIndex = $sValue;
            }
        }

        return $mValues;
    }
} 
