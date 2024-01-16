<img class="hatterkep" src="./images/gym2.jpg">
<div class="berlet">
    <h1 class="h1cimsor">Itt tudja megrendelni a bérletkártyáját:</h1>
    <div class="uzenet">
        <form name="kapcsolat" action= "?oldal=rendelesmutat" method="post">
            <table>
                <tbody>
                <tr>
                    <td>Megye:</td>
                    <td><select class="kitoltendo" name="megye">
                            <option value="Budapest">Budapest</option>
                            <option value="Bács-Kiskun">Bács-Kiskun</option>
                            <option value="Baranya">Baranya</option>
                            <option value="Békés">Békés</option>
                            <option value="Borsod-Abaúj-Zemplén">Borsod-Abaúj-Zemplén</option>
                            <option value="Csongrád-Csanád">Csongrád-Csanád</option>
                            <option value="Fejér">Fejér</option>
                            <option value="Győr-Moson-Sopron">Győr-Moson-Sopron</option>
                            <option value="Hajdú-Bihar">Hajdú-Bihar</option>
                            <option value="Heves">Heves</option>
                            <option value="Jász-Nagykun-Szolnok">Jász-Nagykun-Szolnok</option>
                            <option value="Komárom-Esztergom">Komárom-Esztergom</option>
                            <option value="Nógrád">Nógrád</option>
                            <option value="Pest">Pest</option>
                            <option value="Somogy">Somogy</option>
                            <option value="Szabolcs-Szatmár-Bereg">Szabolcs-Szatmár-Bereg</option>
                            <option value="Tolna">Tolna</option>
                            <option value="Vas">Vas</option>
                            <option value="Veszprém">Veszprém</option>
                            <option value="Zala">Zalaegerszeg</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class='kiemel'>Város: </td>
                    <td>
                        <input class="kitoltendo" type="text" id="varos" name="varos" size="20" minlength="3" pattern="[A-zÀ-ž\s]+" title="Csak betűk adhatók meg!" required>
                    </td>
                </tr>
                <tr>
                    <td class='kiemel'>Cím: </td>
                    <td>
                        <input class="kitoltendo" type="text" id="cim" name="cim" size="30" minlength="6" pattern="[A-z0-9À-ž\s\.\-]+" title="Csak számok, betűk, szóköz, . és - adható meg!" required>
                    </td>
                </tr>
                <tr>
                    <td class='kiemel'>Név:</td>
                    <td>
                        <input class="kitoltendo" type="text" id="nev" name="nev" size="20" minlength = "4" maxlength="20" pattern="[A-zÀ-ž\s]+" title="Csak betűk és szóköz adható meg!" required>
                    </td>
                </tr>
                <tr>
                    <td class='kiemel'>Telefonszám: </td>
                    <td>
                        <input class="kitoltendo" type="text" id="telefon" name="telefon" size="20" minlength="9" pattern="[0-9]+" title="Csak számok adhatók meg!" required>
                    </td>
                </tr>
                <tr>
                    <td  class='kiemel'>
                        Egyéb:
                    </td>
                    <td>
                        <textarea class="kitoltendo" id="szoveg" name="szoveg"  cols="30" rows="10" minlength="10" pattern="[A-z0-9À-ž\s\.\-]+" title="Csak számok, betűk, szóköz, . és - adható meg!" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input id="kuld" type="submit" value="Küldés">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
