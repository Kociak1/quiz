<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo "works";
    try {
    $db = new PDO("pgsql:host=ec2-34-242-89-204.eu-west-1.compute.amazonaws.com;dbname=ddqbqlr89jjlr1","hxezpxeiecwddf","2c587d88221ddd8209399210ac7e03465c4200655d4c395976559e5cede9f193");
            $stmt = $db -> prepare('create table uczniowie(id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,imie text);');
            $stmt -> execute();
            $stmt = $db -> prepare('insert into uczniowie values (null,"jan"),(null,"adam"),(null,"michał"),(null,"piotr")');
            $stmt -> execute();


            $stmt = $db -> prepare('SELECT imie FROM uczniowie');
            $stmt -> execute();

            $result = $stmt -> fetchAll();
            foreach($result as $a) {
                ?>
                <li><?=$a['imie']?></li>
                <?php
            }
                $db=null;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

    
           
      ?>
</body>
</html>
