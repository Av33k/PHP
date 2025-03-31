<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);

$smarty->setTemplateDir(_ROOT_PATH.'/templates');

require_once _ROOT_PATH.'/app/CalcForm.class.php';
require_once _ROOT_PATH.'/app/CalcResult.class.php';
require_once _ROOT_PATH.'/app/CalcCtrl.class.php';

use app\CalcCtrl;

$ctrl = new CalcCtrl();
$ctrl->process();
$ctrl->generateView();
