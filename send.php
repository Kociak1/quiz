<?php
require_once "conn.php";
if(isset($_POST["imie"])) {
$stmt = $db -> prepare("select id from wyniki WHERE imie=:imie and poprawne=:poprawne;");
$stmt -> execute(["imie" => $_POST["imie"], "poprawne" => $_POST["poprawne"] ]);
$result = $stmt -> fetchAll();
if(count($result) == 0) {
    $stmt = $db -> prepare("insert into wyniki(imie,poprawne,punkty) values(:imie,:poprawne,:punkty)");
$stmt -> execute(["imie" => $_POST["imie"], "poprawne" => $_POST["poprawne"],"punkty" => $_POST["punkty"] ]);
}
$stmt = $db -> prepare("select id from wyniki WHERE imie=:imie and poprawne=:poprawne;");
$stmt -> execute(["imie" => $_POST["imie"], "poprawne" => $_POST["poprawne"] ]);
$result = $stmt -> fetchAll();

setcookie("id",$result[0]["id"],time()+3600);
}
$db=null;
header("location: wyniki.php");
