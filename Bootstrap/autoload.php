<?php

/**
 * autoload.php
 * Archivo que posele la logica del autoload
 * 
 * PHP Version 5
 * 
 * @category   AppManager
 * @package    Init
 * @subpackage IndexFile
 * @author     Cristian Lopez <c88lopez@gmail.com>
 * @license    nolicense No license
 * @link       http://nolink.com
 */

/**
 * SplClassLoader implementation that implements the technical interoperability
 * standards for PHP 5.3 namespaces and class names.
 *
 * http://groups.google.com/group/php-standards/web/final-proposal
 *
 *     // Example which loads classes for the Doctrine Common package in the
 *     // Doctrine\Common namespace.
 *     $classLoader = new SplClassLoader('Doctrine\Common', '/path/to/doctrine');
 *     $classLoader->register();
 * 
 * @category Autoload
 * @package  Autoload
 * @author   Jonathan H. Wage <jonwage@gmail.com>
 * @author   Roman S. Borschel <roman@code-factory.org>
 * @author   Matthew Weier O'Phinney <matthew@zend.com>
 * @author   Kris Wallsmith <kris.wallsmith@gmail.com>
 * @author   Fabien Potencier <fabien.potencier@symfony-project.org>
 * @license  http://no-license no-license
 * @link     no-link
 */
class SplClassLoader
{
    private $_fileExtension = '.php';
    private $_namespace;
    private $_includePath;
    private $_namespaceSeparator = '\\';

    /**
     * Creates a new <tt>SplClassLoader</tt> that loads classes of the
     * specified namespace.
     * 
     * @param string $ns          The namespace to use.
     * @param string $includePath La ruta para la inclusion de archivos
     */
    public function __construct($ns = null, $includePath = null)
    {
        $this->_namespace = $ns;
        $this->_includePath = $includePath;
    }

    /**
     * Sets the namespace separator used by classes in the namespace of this class loader.
     * 
     * @param string $sep The separator to use.
     *
     * @return void
     */
    public function setNamespaceSeparator($sep)
    {
        $this->_namespaceSeparator = $sep;
    }

    /**
     * Gets the namespace seperator used by classes in the namespace of this class loader.
     *
     * @return string
     */
    public function getNamespaceSeparator()
    {
        return $this->_namespaceSeparator;
    }

    /**
     * Sets the base include path for all class files in the namespace of this class loader.
     * 
     * @param string $includePath La ruta de inclusion de los archivos
     *
     * @return void
     */
    public function setIncludePath($includePath)
    {
        $this->_includePath = $includePath;
    }

    /**
     * Gets the base include path for all class files in the namespace of this class loader.
     *
     * @return string $includePath
     */
    public function getIncludePath()
    {
        return $this->_includePath;
    }

    /**
     * Sets the file extension of class files in the namespace of this class loader.
     * 
     * @param string $fileExtension La extension de los archivos a incluir
     *
     * @return void
     */
    public function setFileExtension($fileExtension)
    {
        $this->_fileExtension = $fileExtension;
    }

    /**
     * Gets the file extension of class files in the namespace of this class loader.
     *
     * @return string $fileExtension
     */
    public function getFileExtension()
    {
        return $this->_fileExtension;
    }

    /**
     * Installs this class loader on the SPL autoload stack.
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     *
     * @return void
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     * 
     * @return void
     */
    public function loadClass($className)
    {
        if (null === $this->_namespace 
            || $this->_namespace . $this->_namespaceSeparator === substr(
                $className, 
                0, 
                strlen(
                    $this->_namespace . $this->_namespaceSeparator
                )
            )
        ) {
            $fileName = '';
            if (false !== ($lastNsPos = strripos($className, $this->_namespaceSeparator))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace($this->_namespaceSeparator, DS, $namespace) . DS;
            }
            $fileName .= $className . $this->_fileExtension;

            include_once '' . ($this->_includePath !== null ? $this->_includePath . DS : '') . $fileName;
        }
    }
}