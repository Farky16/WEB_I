<img class="hatterkep" src="./images/gym2.jpg">
<div class="berlet">
<?php if(isset($uzenet)) { ?>
    <h1><?= $uzenet ?></h1>
    <?php if($ujra) { ?>
        <a class="vissza" href="?oldal=belepes">Próbálja újra!</a>
    <?php } ?>
<?php } ?>
</div>

