
# Tartalomjegyzék #

1. Vágyálom rendszer rövid ismertetése
2. A vágyálom rendszer
   1. A tanárok szerint
   2. Az igazgató úr szerint
   3. A rendszergazda szerint
3. A tökéletes rendszer
   1. A tökéletes rendszer megvalósítása
4. A megvalósítás problémái
   1. Az E-mail probléma
   2. A file feltöltés probléma
   3. A határidő probléma
5. Konklúzió

# 1. Vágyálom rendszer rövid ismertetése #

Az igazgató úr arra tért ki,hogy szerinte **az ideális rendszer egyszerűen kezelhető**,leegyszerűsítetten működik,**mégis gyors és hatékony**,tehát nem valami bonyolult rendszerre gondolt jelen esetben.Továbbá azt is kiemelte,hogy mivel rengeteg tanár és diák egyaránt dolgozik otthon is,ezért **legyen online elérhető a nap 24 órájában.**

# 2. A vágyálom rendszer #

## 2.1 A tanárok szerint ##

*Az igazgató úr tartott egy rövid megbeszélést a tanárok körében,ahol arra a kérdésre kellett felelni,hogy milyen lenne a megfelelő házifeladat-beadó rendszer.* A tanárok egymás után adták le az ötleteiket,de **születtek közös egyetértések.** A program szempontjából a tanárok is **kiemelték az egyszerűséget,a stabilitást és a hatékony munkavégzést.** Azt kérték,hogy a **megtanulása ne vegyen igénybe túl sok időt** és,hogy akár az idősebb kollégák is könnyen megérthessék,valamint,hogy **az esetleges jegyekről a szülő is tájékoztatást kapjon**,mivel sok gyermek nem mondja el ha esetleg rossz jegyet kapott valamiből,pedig ezt a szülőnek ugyanúgy tudnia kell.Ők is kiemelték,hogy fontos szerintük az,hogy **az osztályzatokat online is betudják írni**,így ha a naplóba vagy krétába kell rögzíteni,akkor csak felmennek és látják melyik gyermeknek hányast adtak,valamint,hogy **a nap 24 órájában rendelkezésre álljon**,mert van,hogy akár az otthoni dolgozatjavítás végeztével írnának ki új házifeladatot.

## 2.2 Az igazgató úr szerint ##

**Az igazgató úr többnyire osztotta a tanárok véleményét**,annyit **azonban ő még pluszban hozzátett**,hogy szerinte **a weboldal** design-ja **legyen egyszerű,mégis letisztult.** A gyerekeknek magukat kelljen regisztrálni,de **ne legyen túl nehéz vagy bonyolult maga a regisztráció**,a tanároknak pedig,hogy könnyebbség legyen,őket már előre regisztráljuk be,mivel a tanárok csapata azért nem váltakozik olyan sűrűn. *Mivel az oldal karbantartása és fejlesztése,valamint üzemelésének figyelése teljes odaadást igényel*,így megegyeztünk,hogy **a rendszergazdának tartunk majd egy rövid bemutatót és ő fogja kezelni a weboldalt** mint admin. Ezek után a rendszergazdával is tartottunk egy rövid megbeszélést.

## 2.3 A rendszergazda szerint ##

**A rendszergazdával összeülve elmagyaráztuk neki a készülendő weboldal technikai működését**,valamint,hogy a tanárok és az igazgató úr miket vár el a weboldallal kapcsolatban. **A rendszergazda szerint a letisztultság és az egyszerűség számára is fontos**,mivel a mindennapokban főleg az idősebb tanárok szokták megkeresni informatikai kérdésekkel kapcsolatban és,ha a weboldal egyszerű,mégis hatékony **azzal időt lehetne megspórolni ami mind a tanároknak és mind neki** is jó lenne,mert így mindenki tud a saját feladatával továbbhaladni és minden kész lenne határidőre. *A rendszergazda továbbá azt is kiemelte,hogy ha szükséges,akkor ő biztosít számunkra szervert*,amire majd felrakhatjuk a weboldalunkat,nem kell sajáton futnia,ellenben azt megbeszéltük,hogy a teszt fázis alatt a mi szerverünkön fog menni és azon fogjuk tesztelni.

# 3. A tökéletes rendszer #

**Az elképzelt tökéletes rendszer tehát ezeknek a szempontoknak kell megfeleljen:**

1. Egyszerű
2. Letisztult
3. Hatékony
4. Online elérhető a nap 24 órájában
5. Tanárok külön regisztrálva előre
6. Diák regisztráció
7. Gyors
8. Stabil

## 3.1 A tökéletes rendszer megvalósítása ##

**A programozókkal összeülve tartottunk egy rövid megbeszélést** azzal kapcsolatban,hogy ***a rendszer egy online szerveren lesz tárolva***,így a nap 24 órájában elérhető. **A rendszergazda lesz az admin és adunk neki jogot a MYSQL tábla eléréséhez**,így ő tudja regisztrálni az új tanárokat,így nem a tanároknak kell majd regisztrálni. Készítünk egy fő oldalt ahol belehet majd jelentkezni és lehet a diákoknak regisztrálni. **Ha esetleg egy diák elfelejtette a jelszavát,akkor legyen jelszóküldő kérelem a weboldalon**. A bejelentkezést követően **a diák lássa,hogy milyen tantárgyakból van házifeladat kiírva**,azoknak **mi a határideje** és ahol a határidő lejárt,oda ne tudjon már feltölteni file-t,valamint lássa,hogy **hova töltött már fel file-t,esetleg mennyit** és,hogy ha **osztályzatot kapott valamelyikre ezt is lássa.** *A regisztrációkor meg kell adnia a diáknak egy e-mal címet ami a sajátja és egyet ami a szülőé.* Így mind a gyerek,mind a szülő értesítést kapna,ha új házifeladat került kiírásra és arról is értesítést kapnának,ha valamelyik beadandóra osztályzat érkezett.

# 4. A megvalósítás problémái #

**A megvalósítás során több probléma is felmerült,ezeket kicsit részletezve itt taglaljuk.**

## 4.1 Az E-mail probléma ##

A probléma ott kezdődik,hogy **a szerveren nincs jelenleg levelezőszerver** telepítve,**így az e-mail küldés funkció egyelőre nem fog működni.** *A későbbiekben* csapatunkkal a szerverre *szeretnénk egy levelezőrendszert telepíteni*,így már az e-mail küldő szolgáltatás működne és *így mind a diákok,mind a szülők értesülnének az eseményekről.*

## 4.2 A file feltöltés probléma ##

*Nem tudjuk megmondani,hogy az adott házifeladathoz mekkora és mennyi file szükségeltetik*,így *nehéz beállítani valamilyen limitet*,hogy mekkora mennyiségű és milyen file-t tölthetnek fel a gyerekek. **Azt viszont biztosra tudjuk,hogy a feltöltéskor futtatható file-ra nincs szükség**,így a feltölsénél a futtatható file-ok feltöltését nem fogjuk engedélyezni,a későbbi problémák és hibák elkerülésének érdekében.

## 4.3 Határidő lezárása ##

*A határidők elkészítéséhez kellene egy bizonyos script file* ami azt figyelné,hogy a kiírt időpontot *mikor éri el az óra és akkor az adott részt lezárja.* Ennek a scriptnek a megírása egy kis időt vesz igénybe,emiatt a program csúszhat,habár az igazgató úr által nincs kiszabott határidő,azért csapatunk szeretne minél előbb kész lenni a feladatokkal.

# 5. Konklúzió #

**A program elkészítése önmagában nem lenne vészesen hosszadalmas és bonyolult**,*viszont sok energiát és időt igényel a csapattól,hogy* belegyen fejezve és a program *az átadáskor a kívánt feltételeknek megfeleljen.* Mivel elég sok a teendő,ezért a csapatot nagy eséllyel részekre kell bontani és minden kisebb csapat egy adott részért fog felelni. Próbálunk majd meetingeket és megbeszéléseket tartani,hogy a munka ugyanúgy ahogy a házifeladat-beadó rendszerben,úgy köztünk is egyszerűen,hatékonyan és gördülékenyen menjen.
