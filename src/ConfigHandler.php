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

namespace ConfigModule;

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
class ConfigHandler
{
    /**
     * Properties
     */
    /**
     * Represents the file path.
     * @var string
     */
    protected $sFilePath;

    /**
     * Represents the file format
     * @var string
     */
    protected $sFileFormat;

    /**
     * Represent the instance of the adapter
     * @var object
     */
    protected $oAdapter;

    /**
     * Namespace of the adapters
     * @var string
     */
    protected $sAdaptersNamespace = 'ConfigModule\Adapters';

    /**
     * Name of the default adapter class
     * @var string
     */
    protected $sAdapterClass = 'Null';

    /**
     * Indicate if the result has to be as an object
     * @var string
     */
    protected $bAsObject = false;

    /**
     * Methods
     */
    /**
     * Class constructor
     */
    public function __construct() {}

    /**
     * Setter for aConfigFilePath
     *
     * @param string $sFilePath Represents the path to the config file
     *
     * @throws \Exception
     * @return ConfigHandler
     */
    public function setConfigFilePath($sFilePath)
    {
        /**
         * Verify the existence of the file
         */
        if (!is_string(realpath($sFilePath))) {
            throw new \Exception('Config path does not exists');
        }

        /**
         * Gets the format of the config file and set the file path
         */
        $this->setFileFormat($sFilePath);
        $this->sFilePath = $sFilePath;

        return $this;
    }

    /**
     * It will return the parameters of the config file in the specified format
     *
     * @return mixed
     */
    public function getConfigValues()
    {
        /**
         * Instantiate adapter according the file format
         */
        $this->setConfigAdapter();

        /**
         * Get the config values
         */
        return $this->oAdapter->getValues($this->bAsObject);
    }

    /**
     * It will set to get the data as an object
     *
     * @return object
     */
    public function getAsObject()
    {
        $this->bAsObject = true;

        return $this;
    }

    /**
     * It will set the adapter according the file format detected
     *
     * @return bool
     */
    protected function setConfigAdapter()
    {
        /**
         * Specify the adapter to use
         */
        $this->sAdapterClass = ucfirst($this->sFileFormat);

        /**
         * Giving shape to the class name to instantiate
         */
        $this->sAdapterClass = '\\' .$this->sAdaptersNamespace . '\\' . $this->sAdapterClass;
        $oAdapter = new $this->sAdapterClass($this->sFilePath);

        /**
         * Setting the adapter
         */
        $this->setAdapter($oAdapter);

        return true;
    }

    /**
     * Setter of the adapter
     *
     * @param \ConfigModule\Adapters\IBase $oAdapter Adapter instance to use
     *
     * @return bool
     */
    protected function setAdapter(\ConfigModule\Adapters\IBase $oAdapter)
    {
        $this->oAdapter = $oAdapter;

        return true;
    }

    /**
     * It will detect and set the file format
     *
     * @param string $sFilePath Represents the path of the file
     *
     * @return bool
     */
    protected function setFileFormat($sFilePath)
    {
        $aFileParts = explode('.', $sFilePath);
        $this->sFileFormat = end($aFileParts);

        return true;
    }

}
