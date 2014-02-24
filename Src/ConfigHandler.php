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

namespace Src;


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
    protected $sAdaptersNamespace = 'Src\ConfigAdapters';

    /**
     * Name of the default adapter class
     * @var string
     */
    protected $sAdapterClass = 'Null';

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
     * @param array $aConfigFilePath array which contains the path for the config file
     *
     * @throws \Exception
     * @return ConfigHandler
     */
    public function setConfigFilePath(array $aConfigFilePath)
    {
        /**
         * Gets the absolute path of the config file
         */
        $sFilePath = realpath('..' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $aConfigFilePath));
        if (!is_string($sFilePath)) {
            throw new \Exception('Config path does not exists');
        }

        /**
         * Gets the format of the config file and set the file path
         */
        $this->setFileFormat($aConfigFilePath);
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
        $this->setAdapter();

        /**
         * Get the config values
         */
        return $this->oAdapter->getValues();
    }

    /**
     * It will set the adapter according the file format detected
     *
     * @return bool
     */
    protected function setAdapter()
    {
        /**
         * Strategy pattern to detect which class instantiate
         */
        switch ($this->sFileFormat) {
            case 'ini':
                $this->sAdapterClass = 'Ini';
                break;
        }

        /**
         * Giving shape to the class name to instantiate
         */
        $this->sAdapterClass = '\\' .$this->sAdaptersNamespace . '\\' . $this->sAdapterClass;
        $this->oAdapter = new $this->sAdapterClass($this->sFilePath);

        /**
         * Validate that the adapter meets which the correct interface
         */
        $this->validateObjectImplementation();

        return true;
    }

    /**
     * It will detect the file format
     *
     * @param array $aConfigFilePath Represents the path divided with slashes and the filename as its final element
     *
     * @return bool
     */
    protected function setFileFormat($aConfigFilePath)
    {
        $sFileName = end($aConfigFilePath);
        $aFileParts = explode('.', $sFileName);

        $this->sFileFormat = end($aFileParts);

        return true;
    }

    /**
     * Checks that the class is being implementing by the correct inteface
     *
     * @throws \Exception
     * @return bool
     */
    protected function validateObjectImplementation()
    {
        $aImplementations = class_implements($this->oAdapter);
        if (!in_array($this->sAdaptersNamespace . '\\' . 'Base', $aImplementations)) {
            throw new \Exception('The class ' . $this->sAdapterClass . ' is not being correctly implemented.');
        }

        return true;
    }
} 