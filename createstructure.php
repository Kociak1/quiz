<?php
require_once "conn.php";
$stmt = $db -> prepare('create table wyniki(id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,imie varchar(50), poprawne int(11), punkty float);');
$stmt -> execute();
$db=null;