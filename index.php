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
        require_once "conn.php";
    $stmt = $db -> prepare('create table wyniki(id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,imie varchar(50), poprawne int(11), punkty float);');
$stmt -> execute();
            if(isSet($_POST['imie'])) {
            $stmt = $db -> prepare("insert into uczniowiee(imie) values(:imie)");
               $stmt -> execute(["imie" => $_POST['imie']]);
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

} catch (Exception $e) {
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
