<img class="hatterkep" src="./images/gym2.jpg">
<div class="berlet">
     <form action = "?oldal=belep" method = "post">
      <fieldset>
          <legend><h2 class="h2cimsor">Bejelentkezés</h2></legend>
        <br>
        <input type="text" name="felhasznalo" placeholder="felhasználó" minlength="6" maxlength="15" pattern="[A-z0-9À-ž]+" title="Csak számok és betűk adhatók meg!" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó" minlength="6" maxlength="20" pattern="[A-z0-9À-ž]+" title="Csak számok és betűk adhatók meg!" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
</div>
<div class="berlet">
    <form action = "?oldal=regisztral" method = "post">
      <fieldset>
          <legend><h2 class="h2cimsor">Regisztráció</h2></legend>
        <br>
        <input type="text" name="vezeteknev" placeholder="vezetéknév"  minlength="2" maxlength="15" pattern="[A-zÀ-ž]+" title="Csak betűk adhatók meg!" required><br><br>
        <input type="text" name="utonev" placeholder="utónév"  minlength="2" maxlength="15" pattern="[A-zÀ-ž]+" title="Csak betűk adhatók meg!" required><br><br>
        <input type="text" name="felhasznalo" placeholder="felhasználónév"  minlength="6" maxlength="15" pattern="[A-z0-9À-ž]+" title="Csak számok és betűk adhatók meg!" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó"  minlength="6" maxlength="20" pattern="[A-z0-9À-ž]+" title="Csak számok és betűk adhatók meg!" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>
 </div>
