# Tartalomjegyzék #
1. Bevezető
2. TortoiseGit letöltése és telepítése
   1. TortoiseGit letöltése
   2. TortoiseGit telepítése
   3. PuTTY key generálása
   4. A Private key használata
3. Github regisztráció és összekötés
   1. A TortoiseGit beállítása a Githubhoz
   2. Az elkészített file commitolása
   3. Az elkészített file feltöltése
4. Zárszó
5. Mellékletek



# 1. Bevezető #

Ez a rövid doksi azért készült,hogy megmutassa honnan kell letölteni és telepíteni a TortoiseGit programot és,hogy hogyan lehet egyszerűen file-okat letölteni,feltölteni és commitolni egy adott Github-os repositoryhoz.

# 2. TortoiseGit letöltése és telepítése #

## 2.1 TortoiseGit letöltése ##

**A TortoiseGit-et az alábbi linken lehet letölteni:** [TortoiseGit.](https://tortoisegit.org/download/)
Itt pedig a megfelelő "bit"-es operációs rendszer kiválasztása után a telepítő file le is fog töltődni. Ha ezzel megvagyunk,akkor első körben csak futassuk a telepítőt.

## 2.2 TortoiseGit telepítése ##

Ha elindítottuk a telepítőt,akkor először is **jelezni fogja**,hogy *melyik verziót készülsz most éppen feltelepíteni*. Itt a **"next"** gombra kattinva tovább enged és ***el kell fogadnunk a felhasználói szerződést***. Ha ezt is megtettük,akkor **két lehetőséget** ad nekünk. Az egyik,hogy a PuTTY-n keresztül telepítsük a programot vagy az OpenSSH-n keresztül. *Mivel az PuTTY jobban kommunikál a windows rendszerrel*,**így itt ezt a lehetőséget kellene kiválasztani**. Ha ez megvolt,akkor egész egyszerűen,csak megmutatja milyen függőségeket fog feltelepíteni a programhoz,itt megadhatjuk,hogy melyek azok amiket szeretnénk és melyek amelyeket nem,ha ez is megvolt,akkor már csal az "Install" gombra rákattintva a program települni fog.

## 2.3 PuTTY key generálása ##

Ha a telepítés végigment a következő feladatunk,hogy *egy publikus és egy privát kulcsot készítsünk*,amellyel majd **tudunk csatlakozni a Github-hoz** és oda file-okat feltölteni,vagy onnan file-okat letölteni. Ehhez a *start-menü-ben* kell megkeresni az újonan telepített *TortoiseGit mappáját* és az abban található **"Puttygen"** programot kell elindítani,ez segít nekünk a kulcsok legenerálásában. Ha a program elindult,mejelenik egy kis ablak,nekünk pedig nincs más dolgunk,csak **kattintsunk rá a "Generate" gombra** és egy kis várakozás után elfogja készíteni a kulcsokat,melyekhez jelszót kell megadnunk.

> Tip: Célszerű könnyen megjegyezhető jelszót adni.

**Ha végigment a procedúra** és a jelszót megadtuk,akkor *kattintsunk a "Save public key" gombra* és meg kell adnunk,hogy hova tegye ezt a kulcsot. **Ha van már olyan mappánk,ahol ilyen kulcsokat mentettünk le**,akkor oda kell ezt is menteni,**amennyiben nincs**,úgy majdnem,hogy bárhova lehet menteni ezt a kulcsot,*a lényeg,hogy emlékezzünk,hogy hova mentettük*. Ezután **el kell menteni a Privát kulcsot is**,ehhez rá kell *kattintani a "Save private key" gombra* és akkor ezt is mentsük le.

> Tip: A legjobb,ha a Publikus és a Privát kulcsot is egy helyre mentjük.

**Ha ez is megvan,akkor jön a következő lépés,ami a Github-ra való regisztráció lesz és előtte a key használata,a PuTTYgen programot viszont NE zárjuk be!**

## 2.4 A Private Key Használata ##

A következő feladatunk,hogy ahonnan megnyitottuk a "PuTTYgen" programot,onnan most a "Pageant" programot kell megnyitni,ott pedig a jobb alsó sarokban megjelenik a kis mini ikonja,arra kell kattintani,majd rákattintunk,hogy "Add key" és ki kell választanunk a private key-ünket amit már lementettünk,majd megadni a hozzá tartozó jelszót amit megadtunk.

> Tip: Ez addig marad aktív,amíg a gépet újra nem indítjuk vagy le nem kapcsoljuk. Ha újraindítjuk,ezt a procedúrát ismét meg kell csinálni,hogy a kulcsot hozzáadjuk.

# 3. Github regisztráció és összekötés #

Nincs más dolgunk,mint felmenni a Github weboldalára,amelyet itt érünk el: [Github](https://github.com)
Itt pedig a *regisztráció fülre kattintva*,nincs más dolgunk csak* regisztrálni kell egy fiókot*. Ha sikerült,akkor *jelentkezzünk be*,menjünk a **settings beállításokra** és ott oldalt **SSH and GPG key fülre**. Itt menjünk a *"New SSH key"* gombra és meg kell adnunk egy kis leírást,alá pedig a *PuTTYgen-ben legenerált hosszú kódot kell beillesztenünk* a **"Key" alatt található szövegrészbe**. Ha megvan,akkor mentsük el a kulcsot és **ha a mentés sikeres** és megvan,akkor már bezárhatjuk a PuTTYgen programot.

## 3.1 Beállítások ##

A következő feladatunk,hogy ahonnan a PuTTYgen programot elindítottuk,ott van egy másik rész,ami a **"Settings"** névre hallgat. Itt a *"Git"* részre kell kattintani és ha a ***"Name" és az "Email" nincs kitöltve,akkor ezt nekünk kell kitölteni***,mielőtt a Git programot használnánk.

## 3.2 Elkészített file Commitolása ##

**Ha megvan a file-unk**,amit felakarunk tölteni,akkor először is *kell egy itt lévő repository a gépen*. **Ha a file/fileok egy mappában vannak már akkor az is lehet a feltöltéshez használandó mappa**,ehhez csak annyit kell tennünk,hogy *rákattintunk a mappára jobb egérgombbal* és megjelenik 3 opció. Itt válasszuk ki a **"Git create repository here..."** lehetőséget. Ezután rákattintunk a felugró ablaknál az **"Ok"** feliratra,majd dobni fog egy **hibaüzenetnek tűnő figyelmeztetést,hogy a mappa nem üres**,itt csak a **proceed gombra kattintsunk**. Ezek után ha ismét ***jobb gombot kattintunk a mappán***,akkor egy új rész jelenik meg,ez pedig a *"Git commit -> master"* rész lesz,erre kell kattintani.Itt most a megjelenő kis ablakban a felső *"Message:" alatti részhez kell hozzáírni,hogy a commitolas mit csinált,tehát milyen file-okat módosítottunk,igazából egy csak egy kis rövid leírás.* **Alatta kell kiválasztani,hogy miket akarunk commitolni**,itt igazából most az összes file-t ki kell választanunk,mivel mindet felszeretnénk tenni. ***A későbbiekben,itt már elég mindig csak azt a file-t commitolni amit éppen módosítottunk.***

## 3.3 A Commitolt file feltöltése ##

*A commitolt file-okat fel lehet tölteni a Github-ra*. Ha van már repository akkor mindjárt szó lesz róla,hogy oda hogyan kell,ha nincs akkor most röviden kitérek,hogy hogyan kell repositoryt készíteni. Ehhez annyit kell tennünk,hogy a fiókunk mellett található plusz jelre kattintva kiválasztjuk,hogy "New repository" és akkor itt tudunk létrehozni magunknak repot. Itt csak megadjuk,hogy mi legyen a neve a repositorynak és,hogy Publikus vagy Privát legyen. Nyugodtan hagyhatjuk a Publikuson is,de ha valaki szeretné a Privátra kattinva megadhatja az emberek neveit,hogy kik férhessenek hozzá,ehhez majd meghívót kell küldeni. *Ha kész a repository,akkor csak rá kell kattintani a mappára és a "Git Sync..." opciót kell választani*. A létrehozott repositoryban található egy **SSH link**,azt kell **beilleszteni a "Remote URL" részhez**,majd *rákattintva a push részre* feltölti azt a repositoryba,és **ha a repositoryt újratöltjük akkor láthatóak lesznek a fent lévő file-jaink.**

> Tip: Nem muszáj külön megnyitni a "Sync" részt,ha az adott mappán jobb egérgombot nyomunk és commitoltunk,akkor utána bezárás helyett ott lesz a bal alsó sarokban,hogy "Push" és akkor ő egyből fel is tölti nekünk.

# 4. Zárszó #

Így kell tehát a TortoiseGit programot letölteni és telepíteni,valamint így kell használni,hogy a saját file-jainkat egy Github-os repositoryban tárolhassuk és azokat bármikor egy adott számítógépre letölthessük és a módosításokat pedig felszinkronizálhassuk a szerverre.

# 5. Mellékletek #

https://www.youtube.com/watch?v=fNPLuJTTto0

https://www.youtube.com/watch?v=cEGIFZDyszA&list=PL6gx4Cwl9DGAKWClAD_iKpNC0bGHxGhcx