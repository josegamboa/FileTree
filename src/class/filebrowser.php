<?php
require_once('interface/interface.php');
require_once 'FolderReader.php';
require_once 'ItemIterator.php';
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Implementation file wroser information
 *
 * Implementation structure, provides the folder content
 *
 * PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   FolderReader
 * @package    
 * @author     Original Author Josè Joaquín Gamboa Sotelo
 * @author     Another Author jose_9515@hotmail.com
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */
class FileBrowser implements __FileBrowser {

    /**
     * File deafult path
     * @var type 
     */
    private $rootPath;

    /**
     * File current path
     * @var type 
     */
    private $currentPath;

    /**
     * Extension filter
     * @var type 
     */
    private $extensionFilter = array();

    /**
     * Construct
     *
     * @param string $rootPath Directory path to list files
     * @param string $currentPath Current directory path to list files - will default to $rootPath if null
     * @param array  $extensionFilter Array of file extensions to filter - will not apply a filter if empty
     */
    function __construct($rootPath, $currentPath = null, array $extensionFilter = array()) {
        $this->rootPath = $rootPath;
        $this->currentPath = $currentPath;
        $this-> extensionFilter = $extensionFilter;
    }

    /**
     * Set private root path
     */
    function SetRootPath($rootPath) {
        $this->rootPath = $rootPath;
    }

    /**
     * Set private current path
     */
    function SetCurrentPath($currentPath) {
        $this->currentPath = $currentPath;
    }

    /**
     * Set private extension filter
     */
    function SetExtensionFilter(array $extensionFilter) {
        $this->extensionFilter = $extensionFilter;
    }

    /**
     * Get files using currently-defined object properties
     * @return array Array of files within the current directory
     */
    function Get() {

        if (is_null($this->currentPath)) {
            $reader = new FolderReader($this->rootPath);
        } else {
            $reader = new FolderReader($this->currentPath);
        }
        $reader->setExtensionFilter($this->extensionFilter);
        $reader->readFolder();
        return $reader->getAllFiles();
    }

}
