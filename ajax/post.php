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


// メール送信  
if (!empty($mailto)) {
	$subject = "掲示板に書き込みがありました。";
	$subject = mb_convert_encoding($subject, "UTF-8", "auto");
	$result = mb_convert_encoding($body, "UTF-8", "auto");

	$header = "MIME-Version: 1.0\r\n"
		  . "Content-Transfer-Encoding: 7bit\r\n"
		  . "Content-Type: text/plain; charset=ISO-2022-JP\r\n"
		  . "Message-Id: <" . md5(uniqid(microtime())) . "@ドメイン>\r\n"
		  . "From: ".$from."\r\n";
	mb_send_mail($mailto, $subject, $result, mb_encode_mimeheader($header), "-f ".$from);
}

try {
	require "../connect.php";

	/* Inserting a new record in the notes DB: */
	//$db->prepare($sql);
	$db->query('INSERT INTO notes (text, name, color, xyz) VALUES ("'.$body.'","'.$author.'","'.$color.'","0x0x'.$zindex.'")');

	$sql = 'SELECT last_insert_rowid()';
	foreach ($db->query($sql) as $row) {
		echo $row[0];
	}
	//echo '0';

} catch (PDOException $e) {
	die($e->getMessage());
}

?>
