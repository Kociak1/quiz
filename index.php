<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Document</title>
    <script defer src="skrypt.js"></script>
</head>
<body>
    <div class="counter" id="counter">60s</div>
    <div class="box">
<div class="pytanie">
    <div class="colA" id="numer">
1 / 10
    </div>
    <div class="colb" id="tresc" >
        <template id="tr">
            <span data-aos="zoom-in-down"></span>
        </template>
        
    </div>
</div>
<div class="odpowiedzi" id="opd">
    <template id="tp1">
        <input type="button" value="odpA" data-aos="fade-up" data-aos-delay="50">
    </template>
    
    
</div>
    </div>
    <dialog class="modal" id="modal">
        <p>Podaj nick</p>
        <div style="display: grid;">
        <input type="text" placeholder="" id="imie">
        <p id="coment"></p>   
        </div>

<input type="button" value="ok" id="setName">
    </dialog>
    <form method="post" id="frm" action="send.php">
        <input type="hidden" id="uname" name="imie">
        <input type="hidden" id="punkty" name="punkty">
        <input type="hidden" id="poprawne" name="poprawne">
    </form>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      
    </script>
</body>
</html>
