<?php
require_once "conn.php";

$stmt = $db -> query("delete from wyniki");

$db=null;