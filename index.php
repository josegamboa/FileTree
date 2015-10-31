<?php ?>
<!doctype html>
<html lang="en">
    <head>
        <title>File browser</title>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.easing.js" type="text/javascript"></script>
        <script src="js/jqueryFileTree.js" type="text/javascript"></script>
        <link href="css/general.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript">

            $(document).ready(function () {


                $('#fileTreeDemo').fileTree({root: '../', script: 'AjaxFileTree.php'}, function (file) {
                    alert("Please add the logic to domload: " + file);
                });


            });
        </script>
    </head>
    <body>
        <h1>File Tree Demo</h1>
        <p>
            Feel free to view the source code of this page to see how the file tree is being implemented.
        </p>
        <div class="example">
            <h2>Basic Example</h2>
            <div id="fileTreeDemo" class="demo"></div>
        </div>
    </body>
</html>