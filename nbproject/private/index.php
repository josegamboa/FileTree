<?php
require_once('src/class/filebrowser.php');
require_once 'src/class/FolderReader.php';
require_once 'src/class/ItemIterator.php';

$reader = new FolderReader('nbproject');
$reader->setExtensionFilter(array("ico", "xml"));
if ($reader->readFolder())
// print_r($reader->getAllFiles());
    $itemIterator = new ItemIterator($reader->getAllFiles("files"));
$itemIterator1 = new ItemIterator($reader->getAllFiles("folders"));
//print_r($itemIterator);
while ($itemIterator1->valid()) {

    echo "Folder: " . $itemIterator1->current()->getName() . "<br>";
    $itemIterator1->next();
}
while ($itemIterator->valid()) {

    echo "File: " . $itemIterator->current()->getName() . "<br>";
    $itemIterator->next();
}
/*
 * Add your filebrowser definition code here
 */

//function read_all_files($root = '.') {
//    $files = array('files' => array(), 'dirs' => array());
//    $directories = array();
//    $last_letter = $root[strlen($root) - 1];
//    $root = ($last_letter == '\\' || $last_letter == '/') ? $root : $root . DIRECTORY_SEPARATOR;
//
//    $directories[] = $root;
//
//    while (sizeof($directories)) {
//        $dir = array_pop($directories);
//        if ($handle = opendir($dir)) {
//            while (false !== ($file = readdir($handle))) {
//                if ($file == '.' || $file == '..') {
//                    continue;
//                }
//                $file = $dir . $file;
//                if (is_dir($file)) {
//                    $directory_path = $file . DIRECTORY_SEPARATOR;
//                    array_push($directories, $directory_path);
//                    $files['dirs'][] = $directory_path;
//                } elseif (is_file($file)) {
//                    $files['files'][] = $file;
//                }
//            }
//            closedir($handle);
//        }
//    }
//
//    return $files;
//}
//print_r(read_all_files($root = 'nbproject'));
?>
<!doctype html>
<html lang="en">
    <head>
        <title>File browser</title>
        <style type="text/css">
			BODY,
			HTML {
				padding: 0px;
				margin: 0px;
			}
			BODY {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				background: #EEE;
				padding: 15px;
			}
			
			H1 {
				font-family: Georgia, serif;
				font-size: 20px;
				font-weight: normal;
			}
			
			H2 {
				font-family: Georgia, serif;
				font-size: 16px;
				font-weight: normal;
				margin: 0px 0px 10px 0px;
			}
			
			.example {
				float: left;
				margin: 15px;
			}
			
			.demo {
				width: 200px;
				height: 400px;
				border-top: solid 1px #BBB;
				border-left: solid 1px #BBB;
				border-bottom: solid 1px #FFF;
				border-right: solid 1px #FFF;
				background: #FFF;
				overflow: scroll;
				padding: 5px;
			}
			
		</style>
                <script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.easing.js" type="text/javascript"></script>
		<script src="js/jqueryFileTree.js" type="text/javascript"></script>
		<link href="css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />
		
		<script type="text/javascript">
			
			$(document).ready( function() {
                           
				
				$('#fileTreeDemo_1').fileTree({ root: '../jquery/', script: 'jqueryFileTree.php' }, function(file) { 
					alert(file);
				});
				
				
			});
		</script>

    </head>
    <body>
        <h1>jQuery File Tree Demo</h1>
		<p>
			Feel free to view the source code of this page to see how the file tree is being implemented.
		</p>
		
		<p>
			<a href="http://abeautifulsite.net/2008/03/jquery-file-tree/">Back to the project page</a>
		</p>
		
		<div class="example">
			<h2>Default options</h2>
			<div id="fileTreeDemo_1" class="demo"></div>
		</div>
		
        <!-- Output file list HTML here -->
        <ul class="jqueryFileTree" style="display: none;">
            <li class="directory collapsed"><a href="#" rel=""></a></li>;
            <li class="file ext_$ext"><a href="#" rel=""></a></li>
        </ul>

    </body>
</html>