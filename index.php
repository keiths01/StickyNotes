<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// Including the DB connection file:
require 'connect.php';

// Removing notes that are older than an hour:
$db->query("DELETE FROM notes WHERE id>3 AND dt<SUBTIME(NOW(),'0 1:0:0')");

$sql = "SELECT * FROM notes WHERE flag=0 ORDER BY id DESC";

$notes = '';
$left='';
$top='';
$zindex='';

foreach ($db->query($sql) as $line) {
	// The xyz column holds the position and z-index in the form 200x100x10:
	list($left, $top, $zindex) = explode('x', $line['xyz']);

	$notes.= '
	<div id="note'.$line['id'].'" class="note '.$line['color'].'" style="left:'.$left.'px;top:'.$top.'px;z-index:'.$zindex.'">
		<img src="./img/delete.png" style="cursor:pointer; " onclick="del_note('.$line['id'].')" />
		'.htmlspecialchars($line['text']).'
		<div class="author">'.htmlspecialchars($line['name']).'</div>
		<div class="date">'.substr($line['dt'],0,16).'</div>
		<span class="data">'.$line['id'].'</span>
	</div>';
}

?>

<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>

	<link rel="stylesheet" type="text/css" href="styles.css" />
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.2.6.css" media="screen" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7/jquery-ui.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.2.6.pack.js"></script>


	<script type="text/javascript" src="script.js"></script>
</head>

<body>
	<h1><?=$comment?></h1>
	<h2><?=$comment2?></h2>

	<div id="main">
		<a id="addButton" class="green-button" href="add_note.html">付箋追加★</a>

	    
		<?php echo $notes?>
	    
	</div>

	<p class="tutInfo">View the <a href="http://tutorialzine.com/2010/01/sticky-notes-ajax-php-jquery/">original tutorial</a>, or download the <a href="demo.zip">source files</a>.</p>
</body>
</html>
