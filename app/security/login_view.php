<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<style>
		.button-secondary {
            background: rgb(44, 236, 108);
			color:white;
			border-radius: 4px;
        }
	</style>
</head>
<body>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
	<legend style="color:cornflowerblue">Logowanie do kalkulatora kredytowego
</legend>
	<fieldset>
		<label for="id_login">Podaj login: </label>
		<input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
		<label for="id_haslo">Podaj hasło: </label>
		<input id="id_haslo" type="password" name="haslo" />
	</fieldset>
	<input type="submit" value="Zaloguj" class="button-secondary pure-button"/>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 15px 15px 15px 30px; border-radius: 10px; background-color: #e66; width:175px; color:white;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

</div>

</body>
</html>