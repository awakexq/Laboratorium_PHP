<?php
require_once dirname(__FILE__).'/../config.php';

//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['lata'] = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}
//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwota']) && isset($form['lata']) && isset($form['oprocentowanie']) ))	return false;	
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty twojego kredytu';
	if ( $form['lata'] == "") $msgs [] = 'Nie podano liczby lat';
	if ( $form['oprocentowanie'] == "") $msgs [] = 'Nie podano oprocentowania';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Kwota kredytu nie jest liczbą!';
		if (! is_numeric( $form['lata'] )) $msgs [] = 'Liczba lat nie jest liczbą!';
		if (! is_numeric( $form['oprocentowanie'] )) $msgs [] = 'Oprocentowanie nie jest liczbą!';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$rata){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['kwota'] = floatval($form['kwota']);
	$form['lata'] = floatval($form['lata']);
	$form['oprocentowanie'] = floatval($form['oprocentowanie']);
	
	//wykonanie operacji
	$miesieczna_stopa = ($form['oprocentowanie'] / 100) / 12;
    $miesiace = $form['lata'] * 12;
	if ($miesieczna_stopa > 0) {
        $rata = $form['kwota'] * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $miesiace)) / (pow(1 + $miesieczna_stopa, $miesiace) - 1);
    } else {
        $rata = $form['kwota'] / $miesiace;
    }
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$rata= null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$rata);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty\Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('rata',$rata);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');