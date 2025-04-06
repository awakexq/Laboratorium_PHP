<?php
namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->lata = getFromRequest('lata');
		$this->form->oprocentowanie = getFromRequest('oprocentowanie');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lata ) && isset ( $this->form->oprocentowanie ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->lata == "") {
			getMessages()->addError('Nie podano ilości lat');
		}
		if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				getMessages()->addError('Kwota nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->lata )) {
				getMessages()->addError('Ilośc lat nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->oprocentowanie )) {
				getMessages()->addError('Oprocentowanie nie jest liczbą');
			}			
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->lata= intval($this->form->lata);
			$this->form->oprocentowanie= intval($this->form->oprocentowanie);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			$miesieczna_stopa = ($this->form->oprocentowanie / 100) / 12;
			$miesiace = $this->form->lata * 12;
			if ($miesieczna_stopa > 0) {
				$this->result->result = $this->form->kwota * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $miesiace)) / (pow(1 + $miesieczna_stopa, $miesiace) - 1);
			} else {
				$this->result = $this->form->kwota / $miesiace;
			}
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		getSmarty()->assign('page_title','Przykład 06a');
		getSmarty()->assign('page_description','Aplikacja z jednym "punktem wejścia". Zmiana w postaci nowej struktury foderów, skryptu inicjalizacji oraz pomocniczych funkcji.');
		getSmarty()->assign('page_header','Kontroler główny');		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		getSmarty()->display('CalcView.tpl');

	}}