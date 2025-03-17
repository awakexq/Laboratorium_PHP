<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$kwota,&$lata,&$oprocentowanie){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$lata,&$oprocentowanie,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty twojego kredytu';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano liczby lat';
	}
	if ( $oprocentowanie == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {
    if (!is_numeric($kwota) || $kwota <= 0) {
        $messages[] = 'Kwota kredytu musi być liczbą większą od zera';
    }
    if (!is_numeric($lata) || $lata <= 0) {
		$messages[] = 'Liczba lat musi być liczbą większą od zera';
    }
    if (!is_numeric($oprocentowanie) || $oprocentowanie < 0) {
		$messages[] = 'Oprocentowanie musi być liczbą większą od zera';
    }
}
	
	// sprawdzenie, czy $lata są liczbami całkowitymi
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$lata,&$oprocentowanie,&$messages,&$rata){
	global $role;
	
	//konwersja parametrówv na int i float
	$kwota = floatval($kwota);
	$lata = intval($lata);
	$oprocentowanie = floatval($oprocentowanie);
	
	//wykonanie operacji
	$miesieczna_stopa = ($oprocentowanie / 100) / 12;
    $miesiace = $lata * 12;
	if ($miesieczna_stopa > 0) {
        $rata = $kwota * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $miesiace)) / (pow(1 + $miesieczna_stopa, $miesiace) - 1);
    } else {
        $rata = $kwota / $miesiace;
    }
}

//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$oprocentowanie = null;
$rata = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lata,$oprocentowanie);
if ( validate($kwota,$lata,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwota,$lata,$oprocentowanie,$messages,$rata);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$lata,$oprocentowanie,$rata)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';