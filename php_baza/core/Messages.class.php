<?php

namespace core;

class Messages {
    private $errors = [];
    private $infos = [];

    public function addError($msg) {
        $this->errors[] = $msg;
    }

    public function addInfo($msg) {
        $this->infos[] = $msg;
    }

    public function isError() {
        return !empty($this->errors);
    }

    public function isInfo() {
        return !empty($this->infos);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getInfos() {
        return $this->infos;
    }
}
