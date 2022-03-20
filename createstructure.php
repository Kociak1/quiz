<?php
require_once "conn.php";
$stmt = $db -> prepare("create table wyniki(id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,imie varchar(50), poprawne int, punkty float);");
$stmt -> execute();
$db=null;
