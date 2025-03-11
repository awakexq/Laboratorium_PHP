<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytowy</title>
</head>
<body>
    <form action="<?php print(_APP_URL); ?>/app/calc.php" method="post">
        <label for="id_kwota">Podaj kwote kredytu: </label>
        <input id="id_kwota" type="text" name="kwota" value="" /><br />
        <label for="id_lata">Podaj liczbe lat: </label>
        <input id="id_lata" type="text" name="lata" value="" /><br />
        <label for="id_oprocentowanie">Podaj oprocentowanie (%): </label>
        <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="" /><br />
        <input type="submit" value="Oblicz" />
    </form>

	<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

    <?php if (isset($rata)) { ?>
        <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
            <?php echo 'Miesięczna rata wynosi : ' . number_format($rata, 2) . ' PLN'; ?>
        </div>
    <?php } ?>
</body>
</html>