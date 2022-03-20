<?php
try {
   // $db = new PDO("mysql:host=localhost;dbname=quiz","root","");
   $db = new PDO("pgsql:host=ec2-52-31-217-108.eu-west-1.compute.amazonaws.com;dbname=dehi8it0p1vfdf","fqvopyaogyimnc","00693446c6da84b3991f6047992f75dde740e6215c1efff656ff0418cc124e74");
} catch(Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
