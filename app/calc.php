<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$lata = $_REQUEST ['lata'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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


// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
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

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';