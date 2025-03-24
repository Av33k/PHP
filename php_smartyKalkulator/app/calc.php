<?php
require_once dirname(__FILE__) . '/../config.php';
require_once _ROOT_PATH . '/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir(_ROOT_PATH . '/templates/');

$x = $_REQUEST['x'] ?? null;
$y = $_REQUEST['y'] ?? null;
$operation = $_REQUEST['op'] ?? null;

$loanAmount = $_REQUEST['loan_amount'] ?? null;
$years = $_REQUEST['years'] ?? null;
$interestRate = $_REQUEST['interest_rate'] ?? null;

$messages = [];
$result = null;
$monthlyPayment = null;

if (!empty($x) && !empty($y) && !empty($operation)) {
    if (!is_numeric($x) || !is_numeric($y)) {
        $messages[] = 'Obie wartości muszą być liczbami!';
    } else {
        $x = floatval($x);
        $y = floatval($y);
        
        switch ($operation) {
            case 'minus':
                $result = $x - $y;
                break;
            case 'times':
                $result = $x * $y;
                break;
            case 'div':
                if ($y != 0) {
                    $result = $x / $y;
                } else {
                    $messages[] = 'Nie można dzielić przez zero!';
                }
                break;
            default:
                $result = $x + $y;
                break;
        }
    }
}

if (!empty($loanAmount) && !empty($years) && !empty($interestRate)) {
    if (!is_numeric($loanAmount) || !is_numeric($years) || !is_numeric($interestRate)) {
        $messages[] = 'Kwota kredytu, liczba lat i oprocentowanie muszą być liczbami!';
    } else {
        $loanAmount = floatval($loanAmount);
        $years = intval($years);
        $interestRate = floatval($interestRate);

        if ($years > 0 && $interestRate >= 0) {
            $monthlyRate = ($interestRate / 100) / 12;
            $numPayments = $years * 12;

            if ($monthlyRate > 0) {
                $monthlyPayment = round($loanAmount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$numPayments)), 2);
            } else {
                $monthlyPayment = round($loanAmount / $numPayments, 2);
            }
        } else {
            $messages[] = 'Liczba lat musi być większa od zera, a oprocentowanie nie może być ujemne!';
        }
    }
}

$smarty->assign('app_url', _APP_URL);
$smarty->assign('page_title', 'Kalkulator');
$smarty->assign('page_description', 'Kalkulator Prosty i Kalkulator Kredytowy.');
$smarty->assign('form', [
    'x' => $x,
    'y' => $y,
    'op' => $operation,
    'loan_amount' => $loanAmount,
    'years' => $years,
    'interest_rate' => $interestRate
]);
$smarty->assign('messages', $messages);
$smarty->assign('result', $result);
$smarty->assign('monthlyPayment', $monthlyPayment);

$smarty->display('calc.html');
