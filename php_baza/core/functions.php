<?php

function getFromRequest($paramName) {
    return isset($_REQUEST[$paramName]) ? $_REQUEST[$paramName] : null;
}

function forwardTo($action) {
    getRouter()->setAction($action);
    getRouter()->go();
    exit();
}

function redirectTo($action) {
    header("Location: " . getConf()->action_root . $action);
    exit();
}

function addRole($role) {
    getConf()->roles[] = $role;
    $_SESSION['_roles'] = serialize(getConf()->roles);
}

function inRole($role) {
    if (!isset(getConf()->roles)) return false;
    return in_array($role, getConf()->roles);
}

function isLogged() {
    if (empty(getConf()->roles)) return false;
    return true;
}
