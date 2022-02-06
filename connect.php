<?php

$title = "連絡板";
$comment = "遠慮なくペタペタ貼ってください♪";
$comment2 = '<a href="stickynotes.sqlite">でーた</a>';
$footer = 'View the <a href="http://tutorialzine.com/2010/01/sticky-notes-ajax-php-jquery/">original tutorial</a>, or download the <a href="demo.zip">source files</a>.';
$mailto = "";
$from = "";

$password = "pass";
$hint = "type 'pass'";

/* Database config */
$db_host	= 'localhost';
$db_user	= 'root';
$db_pass	= '';
$db_database	= 'sticky_notes';

/* End config */
// $db = new PDO("sqlite:".$db_database) or die('Unable to establish a DB connection');
$db = new PDO('mysql:dbname=sticky_notes;host='.$db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
?>
