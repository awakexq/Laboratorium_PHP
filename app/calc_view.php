<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator kredytowy</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button" style="background: rgb(45, 101, 160); color:white; border-radius:5px">Kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active" style="background: rgb(202, 60, 60); color:white; border-radius:5px">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
        <label for="id_kwota">Podaj kwote kredytu: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php out($kwota) ?>" /><br />
		<label for="id_lata">Podaj liczbe lat: </label>
		<input id="id_lata" type="text" name="lata" value="<?php out($lata) ?>" /><br />
        <label for="id_oprocentowanie">Podaj oprocentowanie kredytu: </label>
        <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php out($oprocentowanie) ?>" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" style="border-radius:5px"/>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em; color:white;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($rata)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 10px; background-color: #ff0; width:20em;">
<?php echo 'Rata wynosi: '.$rata; ?>
</div>
<?php } ?>

</div>

</body>
</html>