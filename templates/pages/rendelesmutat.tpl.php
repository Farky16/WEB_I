<img class="hatterkep" src="./images/gym2.jpg">
<?php
if(isset($_POST['megye']) && isset($_POST['varos']) && isset($_POST['cim']) && isset($_POST['nev']) && isset($_POST['telefon']) && isset($_POST['szoveg']))
{
    $uzenet="";

    if (strlen($_POST['varos'])<3 || strlen($_POST['varos'])>20)
        $uzenet="Nem megfelelő hosszúságú városnév!";
    else if (strlen($_POST['cim'])<6 || strlen($_POST['cim'])>30)
        $uzenet= "Nem megfelelő hosszúságú cím!";
    else if (strlen($_POST['nev'])<4 || strlen($_POST['nev'])>20)
        $uzenet="Nem megfelelő hosszúságú név!";
    else if (strlen($_POST['telefon'])<9 || strlen($_POST['telefon'])>16)
        $uzenet= "Nem megfelelő telefonszám";
    else if (strlen($_POST['szoveg'])<10)
        $uzenet="Nem megfelelő hosszúságú szöveg!";
    else
        $uzenet="";

    try {

        $dbh = new PDO('mysql:host=localhost;dbname=ggn', 'ggn', 'Nethely_jelszo.123', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $sqlInsert = "insert into uzenet(id, megye, varos, cim, nev, telefon, szoveg) values(0, :megye, :varos, :cim, :nev, :telefon, :szoveg)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':megye' => $_POST['megye'], ':varos' => $_POST['varos'], ':cim' => $_POST['cim'], ':nev' => $_POST['nev'], ':telefon' => $_POST['telefon'], ':szoveg' => $_POST['szoveg']));
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "Rendelését sikeresen felvettük rendszerünkbe, rendelése: ".'<strong>' ."{$newid}" .'</strong>';
                $ujra = false;
            }
            else {
                $uzenet = "A rendelésed leadása nem sikerült.";
                $ujra = true;
            }
        }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>

<div class="rendel">
    <br>
    <p id="visszajelzes"><?php echo $uzenet ?></p>
    <h2 class="h2cimsor">Rendelés adatai:</h2>
    <div class="uzenet">
        <table class="tblleadott">
            <tbody>
            <tr>
                <td class="tdleadott"><strong>Megye:</strong></td>
                <td class="tdleadott"><?php echo $_POST['megye']; ?></td>
            </tr>
            <tr>
                <td class="tdleadott"><strong>Város:</strong></td>
                <td class="tdleadott"><?php echo $_POST['varos']; ?></td>
            </tr>
            <tr>
                <td class="tdleadott"><strong>Cím:</strong></td>
                <td class="tdleadott"><?php echo $_POST['cim']; ?></td>
            </tr>
            <tr>
                <td class="tdleadott"><strong>Név:</strong></td>
                <td class="tdleadott"><?php echo $_POST['nev']; ?></td>
            </tr>
            <tr>
                <td class="tdleadott"><strong>Telefonszám:</strong></td>
                <td class="tdleadott"><?php echo $_POST['telefon']; ?></td>
            </tr>
            <tr>
                <td class="tdleadott"><strong>Egyéb megjegyzés:</strong></td>
                <td class="tdleadott"><?php echo $_POST['szoveg']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td><br><a class="vissza" href="index.php">Vissza a címlapra!</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>