<?php

namespace app\controllers;

use core\App;
use core\Utils;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new \app\forms\LoginForm();
    }

    public function validate() {
        $this->form->login = getFromRequest('login');
        $this->form->password = getFromRequest('pass');

        if (empty($this->form->login)) return false;
        if (empty($this->form->password)) return false;

        return true;
    }

    public function action_login() {
        if ($this->validate()) {
            if ($this->form->login == "admin" && $this->form->password == "admin") {
                addRole('admin');
                Utils::redirect('listPersons');
            } else if ($this->form->login == "user" && $this->form->password == "user") {
                addRole('user');
                Utils::redirect('listPersons');
            } else {
                getMessages()->addError('Invalid login or password.');
            }
        }

        $this->generateView();
    }

    public function action_logout() {
        session_destroy();
        Utils::redirect('loginDisplay');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}
