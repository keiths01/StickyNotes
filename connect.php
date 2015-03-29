<?php

$title = "連絡板";
$comment = "遠慮なくペタペタ貼ってください♪";
$comment2 = '<a href="stickynotes.sqlite">でーた</a>';

/* Database config */

$db_host		= '';
$db_user		= '';
$db_pass		= '';
$db_database	= 'stickynotes.sqlite';

/* End config */

$db = new PDO("sqlite:".$db_database) or die('Unable to establish a DB connection');
?>
