<?php
require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota= isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->lata = isset($_REQUEST ['lata']) ? $_REQUEST ['lata'] : null;
		$this->form->oprocentowanie = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST ['oprocentowanie'] : null;
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
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->lata == "") {
			$this->msgs->addError('Nie podano ilości lat');
		}
		if ($this->form->oprocentowanie == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Kwota nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->lata )) {
				$this->msgs->addError('Ilośc lat nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->oprocentowanie )) {
				$this->msgs->addError('Oprocentowanie nie jest liczbą');
			}			
		}
		
		return ! $this->msgs->isError();
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
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			$miesieczna_stopa = ($this->form->oprocentowanie / 100) / 12;
			$miesiace = $this->form->lata * 12;
			if ($miesieczna_stopa > 0) {
				$this->result->result = $this->form->kwota * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $miesiace)) / (pow(1 + $miesieczna_stopa, $miesiace) - 1);
			} else {
				$this->result = $this->form->kwota / $miesiace;
			}
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty\Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Laboratorium 5');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}