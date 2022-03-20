<?php
try {
   // $db = new PDO("mysql:host=localhost;dbname=quiz","root","");
   $db = new PDO("pgsql:host=ec2-34-242-89-204.eu-west-1.compute.amazonaws.com;dbname=ddqbqlr89jjlr1","hxezpxeiecwddf","2c587d88221ddd8209399210ac7e03465c4200655d4c395976559e5cede9f193");
} catch(Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}