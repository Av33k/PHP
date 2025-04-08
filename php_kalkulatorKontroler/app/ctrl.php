<?php
require_once dirname(__FILE__) . '/../Config.class.php';

$action = $_REQUEST['action'] ?? 'calcView';

switch ($action) {
    case 'calcView':
        include_once $conf->root_path . '/app/calc/CalcCtrl.class.php';
        $ctrl = new \app\CalcCtrl();
        $ctrl->generateView();
        break;

    case 'calcCompute':
        include_once $conf->root_path . '/app/calc/CalcCtrl.class.php';
        $ctrl = new \app\CalcCtrl();
        $ctrl->process();
        break;

    default:
        echo "Nieznana akcja: $action";
        break;
}
?>
