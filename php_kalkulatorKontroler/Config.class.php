<?php
class Config {
    public $root_path;
    public $app_url;
    public $action_root;
    public $server_url;
    public $action_url;

    public function __construct() {
        $this->root_path = realpath(dirname(__FILE__));
        $this->app_url = '/php_kalkulatorKontroler';
        $this->action_root = $this->app_url . '/app/ctrl.php?action=';
        $this->action_url = $this->action_root;
        $this->server_url = 'http://' . $_SERVER['SERVER_NAME'];
    }
}

$conf = new Config();
?>
