## Bejelentkezés ##

# 1. A bejelentkezés folyamata #

A bejelentkezéshez szükséges metódus a *common.php*-ban van elhelyezve, ennek 3 paramétere van
a email cím és a jelszó amivel megpróbálnak belépni, valamint a már létrehozott sql kapcsolódás objektuma.
A metódus meghíváskor megvizsgálja először az **users** amennyiben itt nem talált megfelelő párost, a **teachers**
táblát. Amennyiben valahol egyezést talált beállítja a *$_SESSION["belepve"]* változót az adott felhasználó id-jére
és a *$_SESSION["level"]*-t 1-re amennyiben tanár, és 0-ra amennyiben diák fiókkal jelentkeztek be

	beleptet($name,$pswd,$conn)


# 2. Tanár vagy diák vizsgálata #

A már csak bejelentkezés után elérhető oldalak elején, meg van vizsgálva a *common.php*-ban lévő *isLoggedIn()* metódussal
hogy az illető bejelentkezett-e már, valamint hogy a *$_SESSION["level"]* értéke-e is hogy megfelelő szintel rendelkezik-e.
Amennyiben az előző kettő közül nem egyezik, vissza irányít az *index.php*-ra.

# 3. Bejelentkezési folyamat az index.php-ben #

Az *index.php*-ben meg van vizsgálva hogy be van-e jelentkezve az illető, ha igen akkor a *$_SESSION['level']*-től függően 
átirányítja a megfelelő oldalra, amennyiben ez nem teljesül de létezik a *$_POST["email"]* és a *$_POST["password"]*
megpróbálja bejelentkeztetni a *beleptet($name,$pswd,$conn)* metódussal.
