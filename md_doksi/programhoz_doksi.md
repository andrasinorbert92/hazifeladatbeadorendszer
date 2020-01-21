
# Tartalomjegyzék #

1. Bevezető
2. Az sqlkapcsolat.php file
3. A regisztracio.php file
4. Az elfogadas.php file
5. A kijelentkezes.php file
6. Az upload-method.php file
7. Zárszó

# 1. Bevezető #

Ez a dokumentum azért jött létre,hogy az általam elkészített regisztrációs felület elemeit elmagyarázza,megértesse,hogy az adott php file-ok mit csinálnak.

# 2. Az sqlkapcsolat.php file #

Az sqlkapcsolat.php file nem egy hosszú kód,nem is nehéz. **Egész egyszerűen annyit csinál,hogy kapcsolatot létesít a weboldal és az SQL szerver között**. Magát a filet ha megnyitjuk,akkor az látható,hogy egy **$kapcsolat változóban meghívom a mysqli connect parancsot**,amellyel sql database-hez lehet kapcsolódni. *Itt négy részre bontódik a parancs*. **Az első rész maga a mysql weboldal ahova csatlakozom**,*a második az ehhez tartozó felhasználónév,majd a harmadik az ehhez tartozó jelszó* és a **legutolsó negyedik rész pedig,hogy melyik adatbázishoz szeretnék csatlakozni**. Ezután van egy feltétel,hogy ha esetleg hibát adna vissza és nem tud csatlakozni az SQL szerverhez a php file,akkor azt írja nekem ki,hogy mi a hiba és hol található.

# 3. A regisztracio.php file #

A regisztráció.php egy egyszerű regisztrációs űrlap,semmi komolyabbat nem helyeztem bele,csak azokat az adatokat amikre szükség van. **A megbeszéltek szerint a diákot majd a tanár vagy éppen az admin fogja az osztályához helyezni**,*ezért külön osztályt a diáknak itt nem kell választania*,ellenben meg kell adnia a nevét,egy jelszót,egy e-mail címet,ezen kívül a két szülője nevét és egy ehhez tartozó e-mail címet. **Minden egyes mező úgy van megadva,hogy azokat kötelező kitölteni,nem maradhat egy sem üresen**,valamint **az e-mail címeknél figyeli a "@" jelet** a file,hogy tényleg e-mailt adjon meg a diák. Ezek után ha minden helyesen van megadva,akkor a "Regisztráció" gombra kattinva a file átirányítódik az elfogadas.php file-ra,ahol a feltöltés történik.

# 4. Az elfogadas.php file #

Az elfogadas.php file annyit csinál,hogy **a regisztracio.php-ból megkapott elemeket ő belehelyezi 1-1 változóba**,majd **megnézi,hogy a jelszót a gyerkőc biztos helyesen írta-e be mind a két alkalommal.** Ha nem,akkor kiírja,hogy a két jelszó nem egyezik,ellenkező esetben megkíséreli feltölteni az adatokat az SQL szerverre. **Azért,hogy ne legyen könnyen ellopható az adat és ne lehessen vele visszaélni,ezért a jelszót MD5-ös titkosításban kódolom és így töltöm fel a MYSQL szerverre**,így az is meglett beszélve a bejelentkezés kapcsán,hogy bejelentkezéskor a jelszót ugyanúgy MD5-ben kell kódolni és a két kódolt verziót kell összehasonlítani,így lehet megállíptani,hogy jó jelszó lett-e beírva. **Ezután ahogy kértétek,ha a regisztrációban nincs hiba,akkor egyből visszadob a főoldalra ami az index.php és már lehet is bejelentkezni.**

# 5. A kijelentkezes.php file #

*A kijelentkezés.php file nem csinál semmi nehezet,ez csak egy prototípus program.* **Ezt is azért töltöttem fel,hogy aki a kijelentkezést készíti,hátha egy kis könnyebbséget ad majd.**Annyit figyel,hogy ha a bejelentkezett név az megegyezik a jelenlegi SESSION-ben található névvel,akkor az adott SESSION-t kapcsolja ki és törölje,így lehet kijelentkeztetni a diákot a fiókjából,de a tanár fiókból való kijelentkezésre is tökéletes ez a program.

# 6. Az upload-method.php file #

**Az upload-method.php file-t azért töltöttem fel,hogy segítsek annak aki a file feltöltéssel fog foglalkozni.** *Ez a file azt csinálja,hogy amikor valaki felakar tölteni egy adott file-t a weboldalra,akkor megvizsgálja,hogy az a file futtatható-e*,vagyis beleolvas a file-ba. *Ha a file futtatható,akkor hibát ír ki,hogy ez a formátum nem megfelelő*,**különben ha a formátummal nincs gond,akkor megkíséreli feltölteni a file-t és kiírja,hogy a feltöltés sikerült.**

# 7. Zárszó #

**Ha bárkinek kell még segítség a file-okkal kapcsolatban,akkor nyugodtan keressen meg és megpróbáljuk megoldani a problémákat!**
