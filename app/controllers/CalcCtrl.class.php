<?php
namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

    private $form;
    private $result;
    private $history;

    public function __construct(){
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->history = array();
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
	
	public function action_calcCompute(){
        $this->getParams();
        
        if ($this->validate()) {
            $this->form->kwota = intval($this->form->kwota);
            $this->form->lata = intval($this->form->lata);
            $this->form->oprocentowanie = intval($this->form->oprocentowanie);
            
            $miesieczna_stopa = ($this->form->oprocentowanie / 100) / 12;
            $miesiace = $this->form->lata * 12;
            
            if ($miesieczna_stopa > 0) {
                $this->result->result = $this->form->kwota * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $miesiace)) / (pow(1 + $miesieczna_stopa, $miesiace) - 1);
            } else {
                $this->result->result = $this->form->kwota / $miesiace;
            }

            try {
                $database = getDB();
                $database->insert("wynik", [
                    "kwota" => $this->form->kwota,
                    "lat" => $this->form->lata,
                    "procent" => $this->form->oprocentowanie,
                    "rata" => $this->result->result,
                    "data" => date("Y-m-d H:i:s")
                ]);
            } catch (\PDOException $ex) {
                getMessages()->addError("Błąd bazy danych: " . $ex->getMessage());
            }
        }
        
        // Zawsze ładujemy historię
        $this->loadHistory();
        $this->generateView();
    }

    public function action_calcShow(){
        getMessages()->addInfo('Witaj w kalkulatorze');
        $this->loadHistory();
        $this->generateView();
    }

    private function loadHistory() {
        try {
            $database = getDB();
            $this->history = $database->select("wynik", [
                "kwota",
                "lat",
                "procent",
                "rata", 
                "data"
            ], [
                "ORDER" => ["data" => "DESC"],
                "LIMIT" => 5
            ]);
        } catch (\PDOException $ex) {
            getMessages()->addError("Błąd przy ładowaniu historii: " . $ex->getMessage());
        }
    }

    public function generateView(){
        getSmarty()->assign('user', unserialize($_SESSION['user']));
        getSmarty()->assign('page_title', 'Kalkulator kredytowy');
        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('res', $this->result);
        getSmarty()->assign('history', $this->history);
        
        getSmarty()->display('CalcView.tpl');
    }
}