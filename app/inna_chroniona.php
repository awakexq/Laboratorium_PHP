<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Chroniona strona</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button"  style="background: rgb(45, 101, 160); color:white; border-radius:5px">Powrót do kalkulatora</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active" style="background: rgb(202, 60, 60); color:white; border-radius:5px">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto; padding: 15px 15px 15px 30px; background-color: cadetblue; color:white; border-radius: 10px;">
	<p>To jest inna chroniona strona aplikacji internetowej</p>
	<p>Możesz wrócic do kalkulatora za pomocą przycisków lub się wylogować.</p>
</div>	

</body>
</html>