<?php

// Error reporting
error_reporting(E_ALL^E_NOTICE);

if (is_uploaded_file($_FILES["file-0"]["tmp_name"])) {
	if (move_uploaded_file($_FILES["file-0"]["tmp_name"], "../files/" . $_FILES["file-0"]["name"])) {
		chmod("../files/" . $_FILES["file-0"]["name"], 0644);
		echo $_FILES["file-0"]["name"] . "をアップロードしました。";
	} else {
		echo "ファイルをアップロードできません。";
	}
} else {
	echo "ファイルが選択されていません。";
}

?>
