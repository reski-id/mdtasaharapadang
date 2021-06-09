<?php
function antiinjeksi($text){
	global $conn;
	$safetext = $conn->real_escape_string(stripslashes(strip_tags(htmlspecialchars($text,ENT_QUOTES))));
	return $safetext;
}
?>
