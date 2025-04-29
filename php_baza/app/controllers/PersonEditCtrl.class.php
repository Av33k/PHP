<?php

namespace app\controllers;

use core\App;
use core\Utils;

class PersonEditCtrl {
    private $form;

    public function __construct() {
        $this->form = new \app\forms\PersonEditForm();
    }

    public function validateSave() {
        $this->form->id = getFromRequest('idperson');
        $this->form->name = getFromRequest('name');
        $this->form->surname = getFromRequest('surname');
        $this->form->birthdate = getFromRequest('birthdate');

        if (empty($this->form->name)) return false;
        if (empty($this->form->surname)) return false;
        if (empty($this->form->birthdate)) return false;

        return true;
    }

    public function action_personNew() {
        $this->generateView();
    }

    public function action_personEdit() {
        $id = intval(getFromRequest('idperson'));
        if ($id) {
            $record = App::getDB()->get("person", "*", [
                "idperson" => $id
            ]);
            if ($record) {
                $this->form->id = $record['idperson'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->birthdate = $record['birthdate'];
            }
        }
        $this->generateView();
    }

    public function action_personDelete() {
        $id = intval(getFromRequest('idperson'));
        if ($id) {
            App::getDB()->delete("person", [
                "idperson" => $id
            ]);
        }
        Utils::redirect('listPersons');
    }

    public function action_personSave() {
        if ($this->validateSave()) {
            if ($this->form->id == '') {
                App::getDB()->insert("person", [
                    "name" => $this->form->name,
                    "surname" => $this->form->surname,
                    "birthdate" => $this->form->birthdate
                ]);
            } else {
                App::getDB()->update("person", [
                    "name" => $this->form->name,
                    "surname" => $this->form->surname,
                    "birthdate" => $this->form->birthdate
                ], [
                    "idperson" => $this->form->id
                ]);
            }
            Utils::redirect('listPersons');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('PersonEditView.tpl');
    }
}
