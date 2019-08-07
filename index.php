<?php 
//session_start(); // запуск сессии
$title="Форма оформления заказа";
require_once 'header.php';

StartDB();
PageHeader();
InputForm();
RateSelector();
InputForm2();
//GetOrder();
//ClientsCheck();

require_once 'footer.php';
