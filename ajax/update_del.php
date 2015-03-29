<?php

// Error reporting
error_reporting(E_ALL^E_NOTICE);

require "../connect.php";

// Escaping:  
$id = (int)$_GET['id'];  
$db->query("UPDATE notes SET flag=1 WHERE id=".$id);  
echo "1";

?>
