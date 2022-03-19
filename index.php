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
            
            if(isSet($_POST['imie'])) {
            $stmt = $db -> prepare("insert into uczniowiee(imie) values(:imie)");
               $stmt -> execute([["imie"] => $_POST['imie']]);
            }
            


            $stmt = $db -> prepare('SELECT imie FROM uczniowiee');
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
    
    <form method="post">
        <input type="text" name="imie">
        <input type="submit">
    </form>
</body>
</html>
