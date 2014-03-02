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

namespace Src\ConfigAdapters;


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
class Json implements \Src\ConfigAdapters\IBase
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
        $sFileContents = file_get_contents($this->sFilePath);
        $mValues = json_decode($sFileContents, !$bAsObject);

        return $mValues;
    }
} 