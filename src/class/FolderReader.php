<?php

require_once('interface/FolderReaderInterface.php');
require_once('FileInfo.php');
require_once('FolderInfo.php');

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * FolderReader, this class does the reading a folder  separating the files and folder in two arrays
 *
 * This class is a test implemantion.
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
class FolderReader implements __FolderReaderInterface {

    /**
     * Current reading path.
     * @var String
     */
    private $rootPath;

    /**
     * Current reading path.
     * @var Array
     */
    private $fileItemList;

    /**
     * Current reading path.
     * @var Array
     */
    private $folderItemList;

    /**
     * Current reading path.
     * @var Array of All Files and Directories
     */
    private $arrayAllFiles;

    /**
     * Array of file extensions to filter by
     * @var Array of All extensions
     */
    private $extensionsfilter;

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of folders, using the currently path
     * @return array Array of folders within the current directory
     */
    public function getFolders() {
        return $this->folderItemList;
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return array Array of files within the current directory
     */
    public function getFiles() {
        return $this->fileItemList;
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return array Array of files and folders within the current directory
     */
    public function getAllFiles($type = NULL) {
        if ($type != NULL) {
            if (isset($this->arrayAllFiles[$type])) {
                return $this->arrayAllFiles[$type];
            }
        } else {
            return $this->arrayAllFiles;
        }
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set Array extensions filtered.
     * @return viod
     */
    public function setExtensionFilter(array $extension=  array()) {
        return $this->extensionsfilter = $extension;
    }

    /**
     * Construct
     *
     * @param string $rootPath Directory path to list files and folders
     * 
     */
    function __construct($rootPath) {
        $this->rootPath = $rootPath;
        $this->fileItemList = new ItemList();
        $this->folderItemList = new ItemList();
        $this->extensionsfilter = array();
        $this->arrayAllFiles = array();
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return Boolean true if the reading was ok , false if has  errors.
     */
    public function readFolder() {
        $read = false;
        if (file_exists($this->rootPath)) {
            $read = true;
            $files = scandir($this->rootPath);
            natcasesort($files);
           
            if (count($files) > 0) {
                // All dirs
                 
                foreach ($files as $file) {
                    //discard folders
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    
                    $path = $this->rootPath . "/" . $file;
                    if (is_dir($path)) {
                        
                        $folderInfo = new FolderInfo();
                        $folderInfo->setName($file);
                        $folderInfo->setPath($path . "/");
                        $this->folderItemList->setItem($folderInfo);
                    }
                }

                $this->arrayAllFiles["folders"] = $this->folderItemList;
                // All files
                foreach ($files as $file) {
                    //dicart files
                    if ($file == '.' || $file == '..') {
                        continue;
                    }

                    $path = $this->rootPath . "/" . $file;

                    if (file_exists($path) && !is_dir($path)) {
                        
                        $fileInfo = new FileInfo($path);
                        if(!$this->isFilterExtension($fileInfo->getExt()))
                        $this->fileItemList->setItem($fileInfo);
                    }
                }
                $this->arrayAllFiles["files"] = $this->fileItemList;
            }
        }

        return $read;
    }

    /**
     * Flter extensions
     * @param type $extension
     * @return boolean
     */
    private function isFilterExtension($extension) {
        $isFiltered = false;
        $extension=".".$extension;
        if (is_array($this->extensionsfilter)) {
            if (in_array($extension, $this->extensionsfilter)) {
                $isFiltered = true;
            }
        }
        return $isFiltered;
    }

}
