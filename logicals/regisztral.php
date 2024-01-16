<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        if (strlen($_POST['felhasznalo'])<6 || strlen($_POST['felhasznalo'])>15)
            $uzenet="Nem megfelelő hosszúságú felhasználónév!";
        else if (strlen($_POST['jelszo'])<6 || strlen($_POST['jelszo'])>20)
            $uzenet= "Nem megfelelő hosszúságú jelszó!";
        else if (strlen($_POST['vezeteknev'])<2 || strlen($_POST['vezeteknev'])>15)
            $uzenet="Nem megfelelő hosszúságú vezetéknév!";
        else if (strlen($_POST['utonev'])<2 || strlen($_POST['utonev'])>15)
            $uzenet= "Nem megfelelő hosszúságú utónév!";
        else
            $uzenet="";

            $dbh = new PDO('mysql:host=mysql.omega:3306;dbname=ggn', 'ggn', 'Nethely_jelszo.123',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "<br>A felhasználói név már foglalt!";
            $ujra = "true";
        }
        else {
            $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                          values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':csaladinev' => $_POST['vezeteknev'], ':utonev' => $_POST['utonev'],
                                 ':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo']))); 
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "<br>A regisztrációja sikeres.<br><br>Azonosítója: {$newid}";
                $ujra = false;
            }
            else {
                $uzenet = "<br>A regisztráció nem sikerült.";
                $ujra = true;
            }
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