<?php

// Error reporting
error_reporting(E_ALL^E_NOTICE);

// Checking whether all input variables are in place:
if (!is_numeric($_POST['zindex']) || !isset($_POST['author']) || !isset($_POST['body']) || !in_array($_POST['color'], array('yellow','green','blue'))) die("0");

if (ini_get('magic_quotes_gpc')) {
	// If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	$_POST['author'] = stripslashes($_POST['author']);
	$_POST['body'] = stripslashes($_POST['body']);
}

// Escaping the input data:
$author = htmlspecialchars(strip_tags($_POST['author']));
$body = htmlspecialchars(strip_tags($_POST['body']));
$color = htmlspecialchars($_POST['color']);
$zindex = (int)$_POST['zindex'];

try {
	require "../connect.php";

	/* Inserting a new record in the notes DB: */
	//$db->prepare($sql);
	$result = $db->query('INSERT INTO notes (text, name, color, xyz) VALUES ("'.$body.'","'.$author.'","'.$color.'","0x0x'.$zindex.'")');

/*if (mysql_affected_rows($link)==1) {
	// Return the id of the inserted row:
	echo mysql_insert_id($link);
}*/
/*if ($result) {
	$result = $db->query('SELECT last_insert_rowid()');
	$row = sqlite_fetch_array($result, SQLITE_ASSOC);
	echo $row;
}
else*/ echo '0';

} catch (PDOException $e) {
	die($e->getMessage());
}

?>
