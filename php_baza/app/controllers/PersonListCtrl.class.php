<?php

namespace app\controllers;

use core\App;
use core\Utils;

class PersonListCtrl {
    private $searchPhrase;

    public function __construct() {
        $this->searchPhrase = getFromRequest('sfraza');
    }

    public function generateView() {
        $records = App::getDB()->select("person", [
            "idperson",
            "name",
            "surname",
            "birthdate"
        ], [
            "OR" => [
                "name[~]" => $this->searchPhrase,
                "surname[~]" => $this->searchPhrase
            ]
        ]);

        App::getSmarty()->assign('people', $records);
        App::getSmarty()->assign('search', $this->searchPhrase);
        App::getSmarty()->display('PersonListView.tpl');
    }
}
