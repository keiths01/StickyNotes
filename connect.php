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


/*$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");*/

$db = new PDO("sqlite:".$db_database) or die('Unable to establish a DB connection');
/*$con = sqlite_open($db_database, 0666, $sqliteerror) or die('Unable to establish a DB connection');

// データベースとの接続を切り離す
function m_close($con) {
	return @sqlite_close($con);
}

// SQL 文を実行
function m_query($con, $query, $errmessage) {
	return @sqlite_query($con, $query, SQLITE_BOTH, $errmessage);
}

// データ取得
function m_fetch_array($rs) {
	return @sqlite_fetch_array($rs);
}

// データ数の取得
function m_num_rows($rs) {
	return @sqlite_num_rows($rs);
}

// SQL 文からデータ取得
function m_sql($con, $query, $errmessage) {
	$rs = m_query($con, $query, $errmessage);
	while ($rowdata = m_fetch_array($rs)) {
		$data[] = array_map("htmlspecialchars", $rowdata);
	}
//	m_free_result($rs);
	return $data;
}*/

?>
