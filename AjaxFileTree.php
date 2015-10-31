<?php
require_once('src/class/filebrowser.php');
require_once 'src/class/ItemIterator.php';
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Iterator implementation
 *
 * Implementation for return all folder information.
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
$defaul = '../';

if (!isset($_POST['dir'])) {
    $fileBrowser = new FileBrowser($defaul);
} else {

    $fileBrowser = new FileBrowser($defaul, $_POST['dir']);
}
$fileBrowser->SetExtensionFilter(array(".DS_Store",".gitignore",".version"));
$arrayFiles = $fileBrowser->Get();
@$itratorFiles = new ItemIterator($arrayFiles["files"]);
@$iteratorFolders = new ItemIterator($arrayFiles["folders"]);

?>
<ul class="jqueryFileTree" style="display: none;">
    <?php
    while ($iteratorFolders->valid()) {

        $name = $iteratorFolders->current()->getName();
        $path = $iteratorFolders->current()->getPath();
        ?>
        <li class="directory collapsed"><a href="" rel="<?php echo $path; ?>"><?php echo $name; ?></a></li>
        <?php
        $iteratorFolders->next();
    }
    ?>
    <?php
    while ($itratorFiles->valid()) {

        $name = $itratorFiles->current()->getName();
        $ext = $itratorFiles->current()->getExt();
        ?>
        <li class="file ext_<?php echo $ext; ?>"><a href="#" rel="<?php echo $name; ?>"><?php echo $name; ?></a></li>
            <?php
            $itratorFiles->next();
        }
        ?>
</ul>
<?php ?>