<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * FolderReaderInterface, uncouple the  implementation FolderReaderInterface
 *
 * This is a basic test of the  FolderReader Method. 
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
interface __FolderReaderInterface {

    /**
     * Construct
     *
     * @param string $rootPath Directory path to list files and folders
     * 
     */
    function __construct($rootPath);

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return true if the reading was ok , false if has  errors.
     */
    public  function readFolder();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of folders, using the currently path
     * @return array Array of folders within the current directory
     */
    public  function getFolders();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return array Array of files within the current directory
     */
    public  function getFiles();
    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get array of files, using the currently path
     * @return array Array of files and folders within the current directory
     */
    public  function getAllFiles();
}
