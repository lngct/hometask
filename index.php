<?php 
//session_start(); // запуск сессии
$title="Форма оформления заказа";
require_once 'header.php';

StartDB();
PageHeader();
InputForm();

//GetOrder();
//ClientsCheck();

require_once 'footer.php';
