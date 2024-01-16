<img class="hatterkep" src="./images/gym2.jpg">
<div id="Motiváció">
    <h2  class='kiemel'>Szeretnél motiválni másokat és kikerülni a büszkeség falunkra?</h2>
    <h3  class='kiemel'>Írd meg, hogy mióta vagy tagja edzőtermünknek majd tölts fel egy előtte-utána képet.</h3>
    <?php
    if (!isset($_SESSION["login"]))
    {
        echo '<h4 class="kiemel">A feltöltéshez bejelentkezés szükséges!</h4>';
    }
    ?>
    <form action="?oldal=motivacio" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="max_file_size" value="110000">
        <label  class='kiemel'>Képed:
            <input type="file" name="fajlok[]" accept="image/png, image/jpeg" multiple required>
        </label>
        <?php
        if (isset($_SESSION["login"]))
        {
        echo '<input type="submit" name="kuld">';
        }
        ?>
    </form>
</div>

<?php
$MAPPA = './motivacio/';
$TIPUSOK = array ('.jpg', '.png');
$DATUMFORMA = "Y.m.d. H:i";
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$MAXMERET = 500*1024;

$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA.$fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl)-4));
        if (in_array($vege, $TIPUSOK)) {
            $kepek[$fajl] = filemtime($MAPPA.$fajl);
        }
    }
}
closedir($olvaso);
arsort($kepek);

foreach($kepek as $fajl => $datum)
{ ?>

    <div class="kep">
        <img class="feltoltott" src="<?=$MAPPA.$fajl ?>">
        <p>Név:  <?= $fajl; ?></p>
        <p>Dátum:  <?= date($DATUMFORMA, $datum); ?></p>
    </div>
<?php }

?>

<?php

$uzenet = array();

if (isset($_POST['kuld'])) {

    $fajlok = $_FILES["fajlok"];
    for($i = 0; $i < count($fajlok["name"]); $i++) {
        if ($fajlok['error'][$i] == 4)
            $uzenet[] = "Nem töltött fel fájlt";
        elseif ($fajlok['error'][$i] == 1
            or $fajlok['error'][$i] == 2
            or $fajlok['size'][$i] > $MAXMERET)
            $uzenet[] = " Túl nagy állomány: " . $fajlok['name'][$i];
        elseif (!in_array($fajlok['type'][$i], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajlok['name'][$i];
        else {
            $vegsohely = $MAPPA.strtolower($fajlok['name'][$i]);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajlok['name'][$i];
            else {
                move_uploaded_file($fajlok['tmp_name'][$i], $vegsohely);
                $uzenet[] = ' A képett sikeresen feltöltötte: ' . $fajlok['name'][$i];
            }
        }
    }
}

if (!empty($uzenet))
{
    echo '<ul>';
    foreach($uzenet as $u)
        echo "<li>$u</li>";
    echo '</ul>';
}
?>