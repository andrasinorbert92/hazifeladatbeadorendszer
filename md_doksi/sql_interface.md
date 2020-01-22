
# Tartalomjegyzék #

1. Az adatbázis elérése php-val
2. Miért pont PDO?
3. A kódban használt PDO utasítások
    1. Adatbázis kapcsolat
    2. Lekérdezések
    3. Táblába író utasítások
4. Az *sql_interface.php* fájl felépítése
    1. Paraméterezhető lekérdezések
    2. Célzott lekérdezések
5. A *config.php* szerepe
6. Források

#  1. Az adatbázis elérése php-val #

Az adazbázis elérésére megannyi megoldás van. Ezek közül a legegyszerűbb, és legtriviálisabb a [mysqli](https://www.php.net/manual/en/book.mysqli.php) függvények használata. Nagyon egyszerűen lehet vele az adatbázishoz kapcsolódni, egy a *PHP*-ban nem annyira jártas személy is könnyen elsajátíthatja, használhatja ezen függvényeket.

# 2. Miért pont PDO? #

Elsősorban gondot jelentett, hogy ha nem mysql adatbázishoz szeretnénk kapcsolódni, akkor már megoldást kell keresnünk, eltérő függvénynevekkel. Egy nagyobb szervezetnél nem feltétlen egy fajta adatbázis van jelen, így a programozóknak adatbázis típusonként kellett megtanulni a függvények használatát. Erre volt megoldás a PDO.

A PDO esetén nem különböztetjük meg az adatbázisokat egymástól, hanem kapnk egy egységes függvény halmazt, melyet használhatunk. Semmivel nem bonyolltabb elsajátítani (sőőőt), mint bármely adatbázis által célzottan használt függvényeket. Ha áttérnénk más adatbázisra, példának okáért **mysql**ről **PostgreSQL**re, nem szükséges belenyúlnunk a kódba, csak az adatbázis elérését kell átírnunk *(amit nyilvánvalóan külön fájlban tárolunk)*.

Ha rákeresünk arra, hogy mi is az a PDO *(és nem angol nyelvű leírást szeretnénk tanulmányozni)*, az alábbi weblap található az elsők közt, mely magyarul elmagyarázza, miért is jó nekünk ([weblap](https://deadlime.hu/2006/02/11/mi-is-az-a-pdo/)). Amennyiben persze megfelel az angol leírás, a [PHP.net](https://www.php.net/manual/en/book.pdo.php) dokumentácóját olvasva sokkal teljesebb képet kapunk a teljes egészről.

Az egésznek a további szépsége, hogy biztonsági okokból is előremutatóbb a PDO használata: gondoljunk bele mekkora munka lenne az *SQLInjection* kivédése egy egyszerű program esetén. Ezt a PDO használatával valamivelegyszerűbben megoldhatjuk.

# 3. A kódban használt PDO utasítások #

1. Adatbázis kapcsolat
2. Lekérdezések
3. Táblába író utasítások

## 3.1. Adatbázis kapcsolat ##

Adatbázis kapcsolatot egy PDO objektum létrehozásával tudjuk megvalósítani. A konstruktor paraméterei az adatbázis *dsn*-e (Data Source Name), az adatbázishoz tartozó felhasználónév, jelszó, illetve egy options paraméter, mely egy asszocaiatív tömbben tárol adatokat. A *dsn* string határozza meg az adatbázis elérését. A létrehzott objektumnak a **beginTransaction()** eljárásának meghívásával kapcsolódik az adatbázisunkhoz.
Konstruktor meghívása: 

    $pdo = new PDO( $dsn, $username, $password, $options);

## 3.2. Lekérdezések ##

Első lépésként megalkotjuk az SQL lekérdezésünket, eltároljuk egy stringbe (*$sql-query*). Ha paraméteres a lekérdezésünk, akkor *?* jelekkel helyettesítjük a paramétert. Az 

    $stmt=$pdo->prepare($sql_query);

paranccsal előkészítjük a lekérdezésünket a futtatáshoz, Majd a

    $stmt->execute($param);

parancs segítségével futtathatjuk a lekérdezésünket. A *$param* paraméter opcionális, egyéb esetben egy rendezett tömb a *?* paraméterek sorrendje szerint.
A lekérdezés eredményét az

    $stmt->fetch(PDO::FETCH_LAZY)

meghívásávalkapom meg, egy asszociatív tömbben. Azért ezt a paramétert használom, mert biztonságosabb a használata a többinél. Ha hamissal tér vissza, akkor üres volt az eredményhalmaz.

## 3.3. Táblába író utasítások ##

Az előző résztől eltérően itt szükségünk van egy **try-catch** szerkezetre, hogy **rollback**elhessünk, tehát visszavonhassuk az adatbázisba való beszúrásunkat, ha hiba lenne a rendszerben.
A *try* ágon belül megadjuk, meddig szeretnénk **rollback**elni, ezt a

    $pdo->beginTransaction();

parancs kiadásával tehetjük meg. Összeállítjuk a stringünket ami az **INSERT** parancsot fogja tartalmazni, a beszúrandó adatok helyét címkékkel láttam el (pl. *:id*, *:email*). A 

    $stmt=$pdo->prepare($sql_query);

parancsot használva előkészítem az utasításunkat, majd minde változó esetén meghívom a

    $stmt->bindparam(':cimke', $változó);

eljárást. Ezzel érem el, hogy a címkék helyére a váltzó értékek kerüljenek be. A korábban bemutatott módon a

    $stmt->execute();

paranccsal futtatom az utasítást. Jelen esetben nincs paramétere a függvénynek, mivel más módon adtuk meg a behelyettesítendő értékeket. Az *execute*  parancs visszatérését vizsgálva, ami ha igaz, akkor sikeresen lefutott az utasításunk, véglegesítem az adatbázisba való beszúrást a

    $pdo->commit();

parancs segítségével.

Amennyiben a program hibára futna a folyamatok alatt, a *catch* ágban meghívjuk a

    $pdo->rollback();

eljárást, mely semmissé teszi a *beginTransaction()* óta változott dolgokat.

# 4. Az *sql_interface.php* fájl felépítése #

1. Paraméterezhető lekérdezés szerkezete
2. Célzott lekérdezések
3. Adatbázist módosító utasítások

## 4.1. Paraméterezhető lekérdezés szerkezete ##

Ez az alfejezet a *select* utasítást tárgyalja ki első sorban. Funkcionalitás szempontjából nem csinál mást, mint a paramétereiből összeállít egy **SQL** lekérdezést, lefuttatja, egy asszociatív tömb formájában visszaadja az eredmény ha van. Ha a lekérdezés nem hozott eredményt, akkor **false** értékkel tér vissza. Jól paraméterezhető, erre néhány példa:

    1. select(tábla);

        /* a tábla  összes oszlopát, sorát megkapjuk eredményül */

    2. select(tábla, oszlopok);

        /* a 2. paraméter az oszlop neveket várja, vesszőkkel elválasztva, **string** formájában*/

    3. select(tábla, oszlopok, sorszűrő);

        /* a 3. paraméter a **WHERE** utáni feltételt várja **string** formájában */

    4. select(tábla, oszlopok, sorszűrő, rendezés);

        /* a 4. paraméterbe megadhatjuk, mely oszlop szerint rendezze növekvőbe, ill. csökkenő sorrendbe az eredményhalmazt */

## 4.2. Célzott lekérdezések ##

A következő függvények a *select()* függvényt hívják meg, különböző paraméterekkel, ellenőrzésekkel. A visszatérési értéket tekintve, alapértelmezettnek a *select()* visszatérési értéke a mérvadó, ahol eltérés van, arra külön kitérek.

Ezen függvények használata sokkal könnyebbé teszi, sokatmondóbbá teszi a kódot átláthatóság tekintetében. Könnyebb kereni, vagy az eredmények számosságát vizsgálni általuk.

Az egyszerűbb függvények rendre:
1. theme_list($columns) - a házifeladatok témáit listázza a megjelenítendő oszlopok függvényében
2. class_list_id_name() - az osztályoknak az *id*, *név* párosait adja eredményül
3. get_userID_By_email($email) - e-mail cím alapján visszaadja a felhasználóazonosítóját
4. role_user() - A felhasználói jogokat tartalmazó táblából visszaadja a tanulók jogaihoz tartozó *id*t
5. classes_filter($classname) - megadja a paraméterben megadott osztálynévhez tartozó *id*t

A *valid_username* függvény kilóg a sorból. A  függvény azt vizsgálja, hogy a paraméterben megadott email-jelszó adatok léteznek-e, ill. összetartoznak-e. A függvény multifunkcionális.
Ha csak az *email* paramétert adjuk meg, akkor megvizsgálja, hogy létezik-e az email a felhasználók között. Ha létezik, akkor **0**-val tér vissza, ha nem, akkor **2**-vel.
Ha megadjuk a *passwd* paramétert, akkor azon felül hogy lellenőrzi hogy létezik-e a felhasználó, megmondja, hogy helyes-e a megadott jelszó ahhoz a fiókhoz, vagy sem. Tehát a visszatérési értékek rendben:

1. valid_username($email);

    - 0: létezik az e-mail cím, és diák az illető
    - 1: létezik az e-mail cím, és tanár az illető
    - 2: nem létezik az adatbázisban

2. valid_username($email, $passwd);

    - 0: létezik az e-mail cím, és diák az illető
    - 1: létezik az e-mail cím, és tanár az illető
    - 2: nem létezik az adatbázisban az email cím
    - 3: létezik az email cím, diák az illető, de rossz a megadott jelszó
    - 4: létezik az email cím, tanár az illető, de rossz a megadott jelszó

## 4.3. Adatbázist módosító utasítások ##

Két ilyen függvény van a fájlban. A tárgyalást kezdem az egyszerűbbel.

Az *insert_parent* függvény a paraméterben megkapott adatokkal beszúr egy sort a *parents* táblába. A paraméterek rendre: *$email*, *$name*, *$user_id*.

A másik függvény a *registration*, mely paraméterben megkapja a:

1. diák adatait: regisztráció dátuma, e-mail cím, vezetéknév, keresztnév, jelszó, osztály neve
2. szülők adatait: név, e-mail cím

Az 1. pontban tágyalt paraméterek string tipusúak, míg, a 2. pontban tárgyaltak tömbök.
A *registration* függvény első körben ellenőrzi, hogy a regisztrálni kívánt e-mail cím létezik-e a diákok vagy a tanárok e-mail címei között. Ha létezik, afüggvény visszatér **1** értékkel. Ha nem létezik, akkor a megadott osztály *id*ját lekérdezi. Lekérdezi továbbá a *user*hez tartzó *id*t, majd a megfelelő adatokat betölti a *users* táblába.

Ha sikeres volt, akkor az imént feltöltött diák *user_id*ját lekérdezi e-mail cím alapján, és a *parenst* táblába felveszi a szülők nevét, e-mail címét és a diák *id*ját, használva a korábban tárgyalt *insert_parents* függvényt.

#  5. A *config.php* szerepe #

A címben megjelölt fájl tartalmazza az adatbázissal, illetve a *sql_interface.php* fájllal kapcsolatos konstansokat. A létezésének az oka, a kényelmes adatbázis költöztetés, valamint a több helyen való tesztelés létének támogatása.

# 6. Források #

- [PDO magyarul](https://deadlime.hu/2006/02/11/mi-is-az-a-pdo/)
- [PDO transaction example](https://thisinterestsme.com/php-pdo-transaction-example/)
- [PDO és az SQL Injection](https://websitebeaver.com/php-pdo-prepared-statements-to-prevent-sql-injection#insert-update-and-delete)
- [PHP Documentation](https://www.php.net/)