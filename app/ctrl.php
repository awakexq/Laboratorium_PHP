<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
require_once dirname (__FILE__).'/../config.php';

//1. pobierz nazwę akcji

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'default';


//2. wykonanie akcji
switch ($action) {
	default :
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
	break;
	case 'action2' :
	break;
}
