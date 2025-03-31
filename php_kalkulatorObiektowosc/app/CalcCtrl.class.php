<?php
namespace app;

require_once dirname(__FILE__).'/../config.php';

use app\CalcForm;
use app\CalcResult;

class CalcCtrl {

    private $form;
    private $res;
    private $errors = [];
    private $infos = [];

    public function __construct() {
        $this->form = new CalcForm();
        $this->res = new CalcResult();
    }

    public function getParams() {
        $this->form->x = $_POST['x'] ?? null;
        $this->form->y = $_POST['y'] ?? null;
        $this->form->op = $_POST['op'] ?? null;
        $this->form->loan_amount = $_POST['loan_amount'] ?? null;
        $this->form->years = $_POST['years'] ?? null;
        $this->form->interest_rate = $_POST['interest_rate'] ?? null;
    }

    public function validate() {
        if (!isset($this->form->x) || !isset($this->form->y)) {
            $this->errors[] = 'Brak danych do działania matematycznego.';
            return false;
        }
        if (!is_numeric($this->form->x) || !is_numeric($this->form->y)) {
            $this->errors[] = 'Wprowadź poprawne liczby do działania.';
            return false;
        }

        if (($this->form->loan_amount || $this->form->years || $this->form->interest_rate)
            && (!is_numeric($this->form->loan_amount) || !is_numeric($this->form->years) || !is_numeric($this->form->interest_rate))) {
            $this->errors[] = 'Błędne dane kredytowe.';
            return false;
        }

        return true;
    }

public function process() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->getParams();

        if (!$this->validate()) {
            return;
        }

        $x = floatval($this->form->x);
        $y = floatval($this->form->y);

        switch ($this->form->op) {
            case 'plus':
                $this->res->result = $x + $y;
                $this->res->op_name = '+';
                break;
            case 'minus':
                $this->res->result = $x - $y;
                $this->res->op_name = '-';
                break;
            case 'times':
                $this->res->result = $x * $y;
                $this->res->op_name = '*';
                break;
            case 'div':
                if ($y == 0) {
                    $this->errors[] = "Nie dziel przez zero!";
                    return;
                }
                $this->res->result = $x / $y;
                $this->res->op_name = '/';
                break;
        }

        if ($this->form->loan_amount && $this->form->years && $this->form->interest_rate) {
            $P = floatval($this->form->loan_amount);
            $n = floatval($this->form->years) * 12;
            $r = floatval($this->form->interest_rate) / 100 / 12;
            $this->res->monthlyPayment = round(($P * $r) / (1 - pow(1 + $r, -$n)), 2);
        }

        $this->infos[] = 'Wykonano obliczenia.';
    }
}


    public function generateView() {
        global $smarty;
		$smarty->assign('page_title', 'Kalkulator');
		$smarty->assign('page_description', 'Kalkulator Prosty i Kalkulator Kredytowy.');
        $smarty->assign('form', $this->form);
        $smarty->assign('res', $this->res);
        $smarty->assign('errors', $this->errors);
        $smarty->assign('infos', $this->infos);
        $smarty->display('calc.html');
    }
}
