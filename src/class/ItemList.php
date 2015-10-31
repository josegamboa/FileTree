<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Iterator item detail
 *
 *Container structure, provides the file detail information
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
class ItemList implements \Countable {
   
    /**
     *
     * @var type Countable
     */
    private $arrayItems= array();
 
    /**
     * Get Index of Item array
     * @param type $index element
     * @return type Array
     * 
     */
    public function getItem($index) {
        try {
            $item = NULL;
            if (array_key_exists($index, $this->arrayItems)) {
                $item = $this->arrayItems[$index];
            }
            return $item;
        } catch (Exception $e) {

            throw $e;
        }
    }
    
    /**
     * Set new  Item
     * @param $item
     * @return type
     * 
     */
    public function setItem($item) {
        try {
            array_push($this->arrayItems, $item);
            return $this->count();
        } catch (Exception $e) {

            throw $e;
        }
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @param int $mode [optional] <p>
     * The optional <i>mode</i> parameter will be set to
     * <b>COUNT_NORMAL</b> or <b>COUNT_RECURSIVE</b>, depending
     * on what value was passed to the second parameter of <b>count</b>.
     * This is particularly useful for counting all the elements of
     * a multidimensional array/Countable combination.
     * </p>
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count() {
        return count($this->arrayItems);
    }

}
