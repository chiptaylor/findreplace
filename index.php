<?php

function addDelimiters (&$in) {
	$in = '/' . trim($in) . '/';
	
}

if (isset($_POST['find'], $_POST['replace'], $_POST['text']) === true) {
	if (empty($_POST['find']) === false) {
		$find = explode(',', $_POST['find']);
		array_walk($find, 'addDelimiters');
		
	}
	$text;
	$replace = (empty($_POST['replace']) === false) ? explode(',', $_POST['replace']) : ''; // Another way to do this is  preg_split('/,\s+/', $_POST['replace'])
	$replace = str_replace(' ', '', $replace);
	$text = (empty($find) === false && empty($replace) === false) ? preg_replace($find, $replace, $_POST['text']) : $_POST['text'];

}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Find and Replace Text</title>
</head>

<body>

<form action="" method="post">

<input type="text" name="find" placeholder="Words, to, find" > 
<input type="text" name="replace" placeholder="Replacement, text, here" >
<p><textarea name="text" rows="8" cols="41"><?php echo (empty($text) === false) ? $text : ''; ?></textarea></p>
<input type="submit">
</form>
</body>
</html>