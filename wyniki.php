<?php
require_once "conn.php";
$id=0;
/*create table wyniki(
    id int PRIMARY KEY AUTO_INCREMENT,
    imie varchar(50),
    poprawne int,
    punkty float
    )*/



$stmt = $db -> prepare("select id, imie,poprawne,punkty from wyniki order by punkty desc, poprawne desc");
$stmt -> execute();

$result = $stmt -> fetchAll();

if(isSet($_COOKIE["id"])) {
    $id=$_COOKIE["id"];
}

$db=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>karta wyników</title>
    <link rel="stylesheet" href="styl1.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <h1 data-aos="zoom-in" >Wyniki</h1>
    <section id="cards"  data-aos="fade-up" data-aos-delay="200">
        <?php
        $m=1;
        foreach($result as $a):
        ?>
        <div class="card <?=($id==$a['id'] ? 'active aos-init aos-animate' : '') ?>" <?=($id==$a['id'] ? 'data-aos="zoom-in"' : "" ) ?>>
            <div class="colA"><?=$m++?>.</div>
            <div class="colB">
                <h2><?=$a["imie"]?></h2>
                <p>punkty: <?=$a["punkty"]?></p>
                <p>poprawne: <?=$a["poprawne"]?>/<span class="ile"></span></p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </section>
    <script src="skrypt2.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>