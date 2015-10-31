<?php
require_once('interface/FileInfoInterface.php');
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * File info Basic structure 
 *
 *Container structure, provides the file information
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
class FileInfo implements FileInfoInterface {
   /**
     * Contains the File name.
     * @var String
     */
    private $name;
    /**
     * Contains the File extension.
     * @var String
     */
    private $ext;
     /**
     * Contains the File relative path.
     * @var String
     */
    private $path;
    /**
     * Contains the File size KB.
     * @var String
     */
    private $size;
    /**
     * File Name
     * @return String 
     */
    function getName() {
        return $this->name;
    }
     /**
     * File Extension
     * @return String 
     */
    function getExt() {
        return $this->ext;
    }
   
    /**
     * File Path
     * @return String 
     */
    function getPath() {
        return $this->path;
    }
    /**
     * File Size KB
     * @return String 
     */
    function getZise() {
        return $this->size;
    }
    /**
     * 
     * @param type $name
     */
    function setName($name) {
        $this->name = $name;
    }
    /**
     * 
     * @param type $ext
     */
    function setExt($ext) {
        $this->ext = $ext;
    }
    /**
     * 
     * @param type $path
     */
    function setPath($path) {
        $this->path = $path;
    }
     /**
      * 
      * @param type $zise
      */
    function setZise($zise) {
        $this->size = $zise;
    }
    /*
     *  Constructor file info
     *  @param string $path  Directory path to read the file
     */
    function __construct($path) {
        $this->path = $path;
        $this->loadFileInfo();
    }

    /**
     * Load all file  information
     * @return void
     */
    private function loadFileInfo() {
        $path_parts = pathinfo($this->path);
        $this->ext = @$path_parts['extension'];
        $this->name =  $path_parts['basename'];
        $this-> size = filesize ($this->path);
    }

}
