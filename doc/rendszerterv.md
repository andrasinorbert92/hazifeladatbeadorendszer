# Tartalomjegyzék #

1. Adatterv
2. Adatvédelmi terv
3. A rendszer működésének terve
4. Funkciók terve (programspecifikációk)



#	1. Adatterv #
	
	MySQL adatbázis kapcsolat:
	Egy külső adatbázis kapcsolat létrehozása ahonnan adatokat kér le és dolgoz fel.
  

#	2. Adatvédelmi terv #

	Regisztráció és belépés:
	
	A weboldal összes funkcióját, a belépést kivéve csak bejelentkezés után lehessen elérni.
	
	Regisztrációkor megkell adni: vezetéknév, keresztnév, jelszó, születési dátum, email cím, szülők neve, és az egyik szülő email címe.
	

#	3. A rendszer működésének terve #

	A megrendelő kérései hogy kiszolgálja a tanárok és a diákok igényeit. Összességében 
	egy olyan online, grafikus rendszer megvalósítása a feladat, ahol a felhasználó regisztráció
	és bejelentkezés után egy egyszerű webfelelületen, könnyedén fel tudja vinni az adatokat.
	
	A megvalósításhoz két felületet szükséges létrehozni:
 
	Egy tanár felület, ahol tanár házifeladatokat tud kiírni, és le tudja osztályozni az ezekre a diákok által beküldött feladatokat.
	
	Szükség van még egy diák felületre is, ahol a diákok a számukra kiírt feladatokhoz tudják feltölteni a fájlokat. Majd ugyan ezen a felületen a jegyet is meg tudhatják.


#	4. Funkciók terve (programspecifikációk) #

	## Regisztráció: ##
	
	Bármely diák a szükséges megadott adatokkal regisztrálhat, viszont a tanároknak a 
	fiókjai előre megadottak és csak a rendszergazda tud újat létrehozni.

	
	## Bejelentkezés: ##
	
	A tanár vagy a diák az elvégzett regisztráció után a regisztráció folyamán, vagy a 
	számára előre megadott felhasználónév-jelszó párosítással beléphet a weboldalra.
	
	## Jelenleg kiadott házifeladatok: ##
	
	Kizárólag a tanár számára érhető el, itt tudja megtekinteni az általa kiadott összes feladatot.
	
	## Új házifeladat kiírása: ##
	
	Kizárólag a tanár számára érhető el, itt tud új feladatot kiírni a diákok számára,
	a megfelelő osztálynak.
	
	## Osztályok: ##
	
	Kizárólag a tanár számára érhető el, ki listázza a kiválaszott osztály tanulóit és az
	érdemjegyiket ha már van.
	
	## Házifeladatok: ##
	
	Kizárólag a diák számára érhető el, ki listázza az eddigi osztályzatait, és a még feltöltésre
	várókat.



