<?php
require_once 'init.php';

getRouter()->setDefaultRoute('listPersons');
getRouter()->setLoginRoute('login');

getRouter()->addRoute('listPersons', 'PersonListCtrl');
getRouter()->addRoute('loginDisplay', 'LoginCtrl');
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl');
getRouter()->addRoute('addPerson', 'PersonEditCtrl', ['user', 'admin']);
getRouter()->addRoute('editPerson', 'PersonEditCtrl', ['user', 'admin']);
getRouter()->addRoute('savePerson', 'PersonEditCtrl', ['user', 'admin']);
getRouter()->addRoute('removePerson', 'PersonEditCtrl', ['admin']);

getRouter()->go();
