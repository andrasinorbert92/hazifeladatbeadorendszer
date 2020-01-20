# Tartalomjegyzék #

1. Rövid ismertető a program terveiről
2. Szerepkörök ismertetése
   1. Diák szerepkör
   2. Tanár szerepkör
   3. Szülő szerepkör
   4. Admin szerepkör
3. Program felépülése
4. Program felhasználásához szükséges eszközök leírása
5. Zárszó a programmal kapcsolatban


# 1. Rövid ismertető a program terveiről #

A program úgy íródik,hogy **négy különböző szerepkört bont szét** feladatokra és alfeladatokra. Önmagában ez egy *házifeladat-beadó rendszer* lenne,amelynek ***célja,hogy a gyerekek,szülők és tanárok dolgát is megkönnyítse***. Maga a program fő célja,hogy a *gyerekek egy darab weboldalon keresztül letudják minden feladatukat* adni,ezáltal csökkentve annak a lehetőségét,hogy esetleg elhagyják a papírt amire a házit írták,a *tanároknak is könnyebb a feladatok javítása,mivel egyből látják ki töltötte azt fel és ki nem*,valamint a *szülőknek is jobb,mivel egyből kapniuk kellene egy e-mailt* arra vonatkozóan,hogy az adott *tantárgyból a tanár új feladatot írt ki* és,hogy *az adott feladatra a gyerek hányast kapott*.

# 2. Szerepkörök ismertetése #

## 2.1 Diák szerepkör ##

**A diák felhasználó** lényege annyi,hogy ő az egyetlen **aki tud regisztrálni a weboldalra**,a regisztrációkor pedig *meg kell adnia a két szülő nevét és egy darab e-mail címét a szülőknek*. A diák ezen kívül természetesen *meg kell adja a saját nevét*,*e-mail címét* és egy *jelszót*,ezek után a jól megszokott *e-mail és jelszó párossal be tud majd jelentkezni*. Az itt látható *kiírt házifeladat feladatokra kell neki valamilyen file-t beküldeni*,amelyet majd a tanár értékel. A **későbbiekben** ezeket *szét lehet majd tantárgyakra* szedni és a ***diák ki tudja majd választani,hogy melyik tantárgyra kívánja a beadandóját feltölteni***. Ezután kapjon róla e-mailt,hogy a tanára osztályozta a feltöltött beadandóját,valamint tudja kilistázni,hogy melyik tantárgyra adott már be beadandót,hogy tudja hol tart.

## 2.2 Tanár szerepkör ##

*A tanárnak nem szükséges regisztráció*,mivel őket már az admin előre hozzáadja a házifeladat-beadó rendszerhez.Ez a csoport **tud majd új témákat kiírni**,hogy milyen tantárgyra,milyen témában vár házifeladatot az adott diáktól. *Az adott tárgyra beküldött feladatokat ő kitudja listázni* és *megtudja tekinteni*,hogy a feladatot ki adta le,milyen tantárgyra és mikor. *Ezek alapján* már csak a file-t kell megtekinteni és ez alapján *eltudja dönteni,hogy az adott beadandó hányas jegyet érdemel* és a munkát *osztályozni is tudja ott*,erről pedig **mennie kell egy értesítő e-mailnek**,amelyet **a diák és a szülő egyaránt megkap**. Ha esetleg a jegy nem jó,vagy a diák reklamálna,akkor a jegy módosítható legyen.

## 2.3 Szülő szerepkör ##

*A szülőnek sincs szüksége külön regisztrációra*,mivel a *diák* amikor *beregisztrálja a saját fiókját*,akkor már a **szülőt is "be regisztrálja" egyúttal**,mivel meg kell adni a két szülő nevét és egy közös e-mail címet. **Ha a gyerek esetleg tölt fel egy file-t** egy adott témában,**akkor a szülő arról kap egy e-mailt**,valamint arról is,**ha a tanár új feladatot írt ki** és **ha a gyerek valamely beadandója értékelésre került**. Ezek alapján a szülő tudja felügyelni,hogy a gyerek mennyire készül és tanul az órakra.

## 2.4 Admin szerepkör ##

*Az admin dolga,hogy felügyelje az egész rendszert*,ha esetleg valahol hiba vagy probléma keletkezik,azokat elhárítsa. *Ő az aki az új tanárokat felveszi* a rendszerbe,ha szükséges és *ha a szülőknek nem felel meg az adott regisztrált e-mail* akkor kérés esetén akár módosítsa is azt,hogy *új e-mailre kapjanak a szülők értesítést*.

# 3. Program felépülése #

*A program először egy főoldalal nyit*,amelyen lehetőség lesz *bejelentkezni vagy regisztrálni*. A későbbiekben ha valaki esetleg elfelejtette a jelszavát,akkor egy e-mail cím által emlékeztetőt kérhet a rendszertől. **Ha egy diák regisztrál,akkor egyből visszadobja a főoldalra és már lehet is bejelentkezni**.Ha bejelentkezik az adott diák,akkor a *főoldalon láthatja,hogy milyen feladatok vannak éppen kiírva*,és amelyre már töltött fel feladatot,azt megtudja nézni,*valamint ahova már Osztályzatot kapott*,azt kiírja neki és *oda viszont már file feltöltési lehetősége nincsen*. *Ha esetleg már az összes tárgyból töltött fel file-t* és *mindegyik osztályozva van*,**nincs is kiírva új feladat**,akkor egész egyszerűen a ***"Kijelentkezés" gombra kattinva eltudja hagyni az oldalt.***

# 4. Program felhaszálásához szükséges eszközök leírása #

**A program egy VPS szerveren van tárolva**,amelyet online ellehet érni. **A regisztrációt és feltöltött file-okat egy SQL adattáblában rögzíti**. A tanár csak a feltöltött file-okat tudja lekérni,míg az admin mindent. Ezen kívül **a program egy FTP elérésen keresztül van tárolva**,így itt a módosításokat feltöltve lehet tesztelni és megtekinteni. **A módosított programokról egy Github repository készült,melyen keresztül megtekinthető**,hogy mikor,ki és milyen módosítást hajtott végre.

# 5. Zárszó a programmal kapcsolatban #

Maga a feladat nem egyszerű,de nem kivitelezhetetlen. Az elkészült szoftver szerintem jól fog helytállni és szerintem mind a szülők,mind a gyerekek és mind a tanárok számára nagyon hasznos lesz és a mindennapi munkát nagyban megkönnyíti és elősegíti,a gördülékenyebb ügyintézés érdekében.
