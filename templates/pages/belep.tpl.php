<img class="hatterkep" src="./images/gym2.jpg">
<div class="berlet">
<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Bejelentkezett:</h1>
        Azonosító: <strong><?= $row['id'] ?></strong><br><br>
        Név: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong><br><br>
        <a class="vissza" href="index.php">Vissza a címlapra!</a>
    <?php } else { ?>
        <br>
        <h1>A bejelentkezés nem sikerült!</h1>
        <a class="vissza" href="?oldal=belepes" >Próbálja újra!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
</div>