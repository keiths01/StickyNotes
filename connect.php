<?php

$title = "連絡板";
$comment = "遠慮なくペタペタ貼ってください♪";
$comment2 = '<a href="stickynotes.sqlite">でーた</a>';
$footer = 'View the <a href="http://tutorialzine.com/2010/01/sticky-notes-ajax-php-jquery/">original tutorial</a>, or download the <a href="demo.zip">source files</a>.';
$mailto = "";
$from = "";

/* Database config */

$db_host		= '';
$db_user		= '';
$db_pass		= '';
$db_database	= 'stickynotes.sqlite';

/* End config */

$db = new PDO("sqlite:".$db_database) or die('Unable to establish a DB connection');
?>
