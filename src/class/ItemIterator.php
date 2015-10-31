<?php
require_once 'ItemList.php';
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Iterator array structure.
 *
 * Standart iterator
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

class ItemIterator implements \Iterator  {
     /**
     *
     * @var type array Countable
     */
    protected $itemList;

    /**
     *
     * @var type int
     */
    protected $currentItem = 0;

    /**
     * LanguageListIterator Constructor
     * @param \Countable $languageList
     * 
     */
    public function __construct($itemList) {
        try {
            $this->itemList = $itemList;
        } catch (Exception $exc) {

            throw $exc;
        }
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current() {
        try {
            if(is_object($this->itemList))
            return $this->itemList->getItem($this->currentItem);
        } catch (Exception $exc) {

            throw $exc;
        }
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next() {
        $this->currentItem++;
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return scalar scalar on success, or <b>NULL</b> on failure.
     */
    public function key() {
        return $this->currentItem;
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function valid() {
        if(is_object($this->itemList))
        return $this->currentItem < $this->itemList->count();
    }

    /**
     * (PHP 5 &gt;= 5.3.0 )<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind() {
        $this->currentItem = 0;
    }
    
}
