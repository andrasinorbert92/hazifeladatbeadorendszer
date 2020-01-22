# Tartalomjegyzék #

1. Rövid bevezető
2. Az MD használhatósága
3. MD file-ok szerkesztésére alkalmas programok
   1. Notepad++
   2. Visual Studio Code
   3. Microsoft Notepad és Microsoft Wordpad
   4. Apple Textedit
   5. Github
4. Szerkesztéshez formázások
   1. Szöveg Dőltté tétele
   2. Szöveg Félkövérré tétele
   3. Szöveg Félkövérré és Dőltté tétele
   4. Listák készítése
      1. Rendezett Listák
      2. Rendezetlen Listák
5. Zárszó
6. Mellékletek

# 1.Rövid Bevezető #

Ez a rövid dokumentáció azért jött létre,hogy ismertesse,hogy hogyan kell az .MD file formátumot használni,milyen programok alkalmasak a használatára és,hogy milyen egyszerűbb szerkesztési formák vannak benne.

# 2. Az MD használhatósága #

Az *.md file-okat* manapság a programozók használják,mivel a régimódi dokumentációkhoz képest sokkal **egyszerűbb az elsajátítása** és ezért könnyeb is ráérezni, pontosan ezért terjedt el a nagy **multinacionális cégek** körében és használják a **nagyvállalatok** is
előszeretettel. Az .md file-okat nagyon univerzálisan lehet felhasználni manapság és a eléggé könnyen szerkeszthető. Az *MD* a **Markdown Documentation** rövidítése,amely azt jelenti,hogy egy leíró dokumentációt készítünk, amit az *egyes programozók* által ***népszerű programok is többnyire ismernek.***

# 3. MD file-ok szerkesztésére alkalmas programok #

1. Notepad++
1. Visual Studio Code
1. Microsoft Notepad
1. Apple Textedit
1. Microsoft Wordpad
1. A Github file szerkesztője is ismeri

## 3.1 Notepad++ ##

A notepad++ elsősorban weboldalak **HTML,CSS,PHP és Javascript** file-jainak a szerkesztésére szokták használni a programozók,*viszont .md kiterjesztésű file megnyitására* is képes. [A notepad ++ letöltése.](https://notepad-plus-plus.org/downloads/)
A notepad++ **ha minden függőséget leszed**,*akkor alapjáraton engedi a .md file megnyitását*,azonban akinek ez nem így van,ott egy *plugint* kell letölteni és telepíteni a notepad++ alkalmazáshoz,így lehet a file szerkestése után akár meg is nézni,hogy hogyan is mutat az a bizonyos .md file.Ezt az alábbi linken lehet elérni: [Notepad++ plugin](https://github.com/nea/MarkdownViewerPlusPlus)

## 3.2 Visual Studio Code ##

A Visual Studio Code eléggé sok előnyt tartogat magában és *rengeteg plusz funkcióval rendelekzik*,amelyek használata nagyon nagy **előnyt és segítséget** jelent a programozónak,sőt bárkinek aki ezt a formátumot használja.[Visual Studio Code letöltése.](https://visualstudio.microsoft.com/downloads/) Magának a Visual Studio Code-nak a ***legegyszerűbb*** a használata véleményem szerint,mivel nincs más dolgunk,csak egy-két plusz függőséget letölteni és engedélyezni.

Ezek között a következőek találhatóak:

1. Markdown Theme Kit
2. Markdownlint
3. Markdown Preview Enhanced

>Tip: A markdownlint használata nem kötelező,csak ajánlott,mivel figyeli a file-t és jelzi,ha valahol hibát talál.
Ez a három plusz program segíteni fog,hogy minél gyorsabb és jobb dokumentációkat készíthess.

>Tip2: A markdown theme kit is egy csak kis plusz funkció,hogy személyre szabhasd a Visual Studio Code felületét a használathoz.

## 3.3 Microsoft Notepad & Microsoft Wordpad ##

A Microsoft Notepad és Microsoft Wordpad a mai windows 10-ekbe többnyire már bele vannak építve és ezek is képes .md file-ok szerkesztésére,viszont megnyitására és futtatására már nem. Ha valaki esetleg mégis ezekhez a régebbi editorokhoz ragaszkodna,akkor is kelleni fog a fent említett két programból valamelyik,mert ezek képesek viszont a file-okat már futtatni is.

## 3.4 Apple Textedit ##

Az Apple Textedit file ideális minden apple készüléken való .md file szerkesztésére és futtatására. Az apple telefonokon is működik ez a program,bár a telefonokon való MD file-ok szerkesztését én nem ajánlom,gépen sokkal átláthatóbb és könnyebb. Az appstore-on keresztül lehet ezt a programot letölteni és telepítés után azonnal használható. Mivel ez **futtatni** és **szerkeszteni** is képes,így *alkalmasabb* ilyen célra,mint a ***Microsoft Notepad és a Microsoft Wordpad.*** [Apple Texteditor letöltése](https://apps.apple.com/us/app/textedit-for-rtf-latex-md/id1070883678)

## 3.5 Github ##

A Github-on is lehetőségünk van .md file-ok létrehozására és tárolására. Ehhez *regisztrálnunk* kell egy **ingyenes** fiókot a Github-on és ha van egy ***repository*** amihez kapcsolódva vagyunk vagy esetleg ***hoztunk létre saját repositoryt***,akkor azon keresztül **"<>Code"** fülre kattintva rá kell mennünk,hogy **"Create new file"** és már készíthetjük is a következő MD file-unkat a Github saját editorjában.

# 4. Szerkesztéshez formázások #

Az MD file szerkesztéséhez rengeteg forma áll rendelkezésünkre.A file-t majdnem ugyan úgy kell szerkeszteni,mint egy wordpad-es szöveget,csak itt a kiemeléseknek és egyéb formázásoknak külön kis jele van.Nézzük meg a legalapvetőebbeket,amelyekre szükségünk lehet egy mindennapos munka során:

1. *Szöveg Dőltté tétele*
2. **Szöveg Félkövérré tétele**
3. ***Szöveg Félkövérré és Dőltté tétele***
4. Listák készítése
5. Idézetek készítése

## 4.1 Szöveg Dőltté tétele ##

Szöveg dőltté tenni a **"*"** jellel lehet,egész egyszerűen csak el kell helyezni **egy csillagot a szöveg előtt és egyet a szöveg utána**,majdnem olyan mint amikor a **HTML-ben** **"h1 és /h1"** részt használsz.
Akkor a szöveg így fog kinézni: *Ez a szöveg dőlt.*

## 4.2 Szöveg Fékövérré tétele ##

Ha félkövérré akarjuk a szöveget tenni,akkor egész egyszerűen csak **két darab "*" jelet kell lerakni** és ez már meg is valósítható.Ha az előző egy csillag helyett kettőt rakunk le,akkor a szöveg így fog kinézni: **Ez a szöveg félkövér.**

## 4.3 Szöveg Félkövérré és Dőltté tétele ##

A harmadik amikor,az előző kettőt ötvözve szeretnénk használni,ekkor igen egyszerűen az előző két módszert kell ötvöznünk,tehát összesen három darab csillagra lesz szükségünk. Itt is ugyanúgy,mint az előző két résznél,itt is három darab csillag kell a szöveg elé és úgyszint három darab a szöveg után,így fog kinézni: ***Ez a szöveg félkövér és dőlt.***

## 4.4 Listák készítése ##

A listák részt vesznek a mindennapi életünkben és a szerkesztésekben is aktívan részt vesznek,mivel nagyon sokszor és sokféleképpen van rájuk szükségünk. Alapvetően két fajta listát különböztetünk meg,ezek pedig a rendezett és a rendezetlen listák. A listákkal elemeket lehet egymás alá rendelni vagy akár részekre is lehet bontani. A legegyszerűbben úgy kell elképzelni mint egy bevásárolólistát és vagy csak felírkáljuk,hogy miket akarunk venni,ezek a rendezetlen listák,vagy mondjuk egy adott ételhez szeretnénk a hozzávalókat szépen sorban megvásárolni,ezek lesznek pedig a rendezett listák.

### 4.4.1 Rendezett listák ###

A rendezett listák attól válnak rendezetté,hogy előttük szám szerepel és az adott elem még kisebb listára bontása egy behúzással hajtódik végre. Ezt úgy lehet megtenni,hogy az adott elem elé egy "1." jelet rakunk,ezzel jelezve,hogy ő lista elem lesz.
Például:

1. Alma

Ha entert ütünk,akkor egész egyszerűen ő folytatni fogja a listát és lehet hozzáírni a következő elemeket,ehhez nekünk már nincs szükségünk további számok beírására.
Például:

1. Alma
2. Körte
3. Szilva

Ha esetleg szeretnénk a listánkon belül még kisebb részeket létrehozni,akkor az adott elem részekre bontásánál bentebb kell kezdeni a "gyermek" elemet és a program automatikusan odaírja megint a "1." számot jelezve,hogy ez egy bentebb kezdett lista lesz.
Például:

1. Csokitorta
    1. Csoki
    2. Tortaalap
2. Epertorta
   1. Eper
   2. Tortaalap

### 4.4.2 Rendezetlen listák ###

Rendezetlen listák alatt azt értjük,hogy nem adott sorszámmal vannak megjelölve a lista elemei,hanem csak egy kis kötőjellel jelzi,hogy ezek az elemek egy lista részét képzik. Ha rendezetlen listát szeretnénk létrehozni,akkor nincs más dolgunk,mint egy kötőjelet "-" írni a sor elejére és akkor itt is ha entert ütünk,ő szépen írja tovább a listát és több elemet is helyezhetünk bele.

- Motor
- Autó
- Bicikli

Természetesen itt is van lehetőség egy adott lista elemeit még részekre bontani és bentebb kezdeni,itt megint csak annyit kell tennünk,hogy az adott elemet bentebb tabulátorozva kezdjük és innentől azt megint bentebb kezdve külön kezeli.
Például:

- Motor
  - Kaszni
  - Fékek
  - Stb..
- Autó
  - Kerekek
  - Lámpák
  - Fékek
  - Motor
  - Stb..

# 5. Zárszó #

Úgy gondolom,hogy az MD file használata igen könnyen elsajátítható és mégis igen igényes és részletes file-ok készítésére ad lehetőséget. Én csak ajánlani tudom mindenkinek,hogy ezt a fajta fileformátumot használja és sajátítsa el,mivel rengeteg nagy cég állt át erre a módszerre,pontosan ezek miatt az érvek miatt.

# 6. Mellékletek #

https://www.reviversoft.com/en/file-extensions/md

https://docs.microsoft.com/hu-hu/contribute/how-to-write-use-markdown

https://code.visualstudio.com/docs/languages/markdown

https://guides.github.com/features/mastering-markdown/

https://superuser.com/questions/586177/how-to-use-markdown-in-notepad

https://apps.apple.com/us/app/textedit-for-rtf-latex-md/id1070883678