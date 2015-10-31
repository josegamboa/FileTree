<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * File info Basic structure 
 *
 * Container structure, provides the file information
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
interface FileInfoInterface {

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get File Name, using the currently path
     * @return String.
     */
    function getName();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get Extension file, using the currently path
     * @return String.
     */
    function getExt();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get Extension file, using the currently path
     * @return String.
     */
    function getPath();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Get Size file, using the currently path
     * @return String.
     */
    function getZise();

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set File Name
     * @param type String $name
     */
    function setName($name);

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set Extension file, using the currently path
     * @param type String $ext
     */
    function setExt($ext);

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set Path file, using the currently path
     * @param type $path
     */
    function setPath($path);

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set Size file, using the currently path
     * @param type $zise
     */
    function setZise($zise);

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Set Extension file, using the currently path
     * @param type $path
     */
    function __construct($path);
}
