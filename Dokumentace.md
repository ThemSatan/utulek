# DOKUMENTACE
<sup>Tato dokumentace poskytuje podrobný přehled funkčnosti projektu 'Kočičí útulek'</sup>


## Notace

> Téma webu: kočičí útulek

### Tabulky a sloupce:
__1.  'kocka'__ ( 'status', 'jmeno', 'vek', 'vaha', 'plemeno', 'fotografie', 'pohlavi', 'narozeni', 'popis')

__2. 'majitel'__ ( 'jmeno', 'vek', 'mesto', 'telefoni_cislo')

__3. 'rasa'__ ( 'nazev' )

__4. 'mesto'__ ( 'nazev_mesta' )

__5. 'adopce'__ ( 'datum_adopce') 


### Popis prvků
Popis názvů tabulek, sloupců a ID
- Česky (bez diakritiky)
- Singulár (jednotné číslo)
- Oddělení ID a cizích ID a dvou slovných názvů pomocí hadí notace
- Malým písmem
> Např. kocici_utulek | kocka | id_kocka


### Popis názvu proměnných, metod a kontrolerů
- Anglicky
- Singulár
- Oddělení dvou (a více) slovných názvů pomocí velbloudí notace
- Na začátku malé písmeno
> Např. login | loginComplete | catController


### Popis názvu ‚views‘, modelů a tříd
- Anglicky
- Singulár
- Oddělení dvou (a více) slovných názvů pomocí velkého písmena na začátku dalšího slova, bez mezery -> ‚pascal case‘
- Na začátku velké písmeno
> Např. MainPage | Cat | Auth


### Popis názvu obrázků
- Česky
- Oddělení dvou (a více) slovných názvů pomocí velkého písmena na začátku dalšího slova, bez mezery
- Na začátku malé písmeno
> Např. kocka.jpg


## Externí nástroje

### __[Bootstrap](https://getbootstrap.com)__

__Verze knihovny:__ 5.0.2

__Autor knihovny:__ Mark Otto a Jacob Thornton

__Licence knihovny:__ MIT License



### __[CodeIgniter](https://codeigniter.com)__
__Verze knihovny:__ 4.5.1

__Autor knihovny:__ Rick Ellis, EllisLab, Inc. (nyní spravováno CodeIgniter Foundation)

__Licence knihovny:__ MIT License


### __[Font Awesome](https://fontawesome.com)__
__Verze knihovny:__ 6.5.2

__Autor knihovny:__ Dave Gandy a Travis Chase

__Licence knihovny:__ SIL OFL 1.1 a MIT License


### __[Composer](https://getcomposer.org)__
__Název knihovny:__ Composer

__Verze knihovny:__ 2.6.2

__Autor knihovny:__ Nils Adermann, Jordi Boggiano

__Licence knihovny:__ MIT License


## Rozdělení práce

_Klára Adámková_
-	Databáze – přidány jména koček a doplněny obrázky
-	Tabulky - editace
-	Přihlášení a registrace
-	Vzhledové upravení webu (CSS) a stránkování
-	Dropdown
-	Agregační funkce a SQL Joins

_Karla Šoustková_
-	Dokumentace a notace
-	ER diagram
-	Databáze
-	Tabulky - přidávání, mazání, soft deletes
-	Zobrazení - karty
-	Modální okno a alerty

## Popis jednotlivých metod a proměnných
### Kontrolery

__1. 'MainController'__

```__construct()```: Nastaví modely pro kočky (kModel), plemena (pModel), fotografie (fModel), majitele (oModel), statusy (sModel) a konfiguraci (CModel).

```initController()```: Nahrazuje základní nastavení kontroleru a nastavuje knihovnu _IonAuth_ pro přihlašování uživatelů.

__Hlavní stránky__:

```catsPage():``` Načte kočky z databáze a zobrazí je na stránce. Nastaví stránkování, titulek stránky a stav přihlášení.

```catsAdoptPage():``` Načte adoptované kočky z databáze a zobrazí je na stránce. Stejně jako catsPage nastaví potřebná data pro zobrazení.

```catsUnavPage():``` Načte kočky, _které nejsou k dispozici_ a zobrazuje je na stránce. Nastaví data pro zobrazení včetně statusu koček.

```catsAvPage():``` Stejné jako catsUnavPage() ale jen pro _dostupné kočky k adopci_.

```catsSinglePage($id):``` Načte informace o konkrétní kočce podle zadaného ID. Zobrazuje informace o kočce a jejím majiteli.

------------

```adoptionInfoPage():``` Získá hodnotu perpage (kolik položek se má zobrazit na jedné stránce). Spojuje tabulky, aby získala informace o kočkách, jejich majitelích a městech.
Načítá tyto informace s omezením na počet položek na stránku (perpage). Zobrazí stránku AdoptionInfoPage s připravenými daty.

```addCat():``` Načte data potřebná pro formulář pro přidání nové kočky, jako jsou plemena a status. Zobrazí formulář.

```createForm():``` Zpracuje formulář pro přidání nové kočky. Uloží data nové kočky do databáze a zobrazí zprávu o úspěšném vytvoření.

```showAll():``` Zobrazuje všechny kočky z databáze na jedné stránce.

```editCat($id):``` Získá informace o konkrétní kočce z databáze podle jejího ID a uloží je do proměnné $data['array']. Získá seznam všech plemen a uloží je do proměnné $data['list']. Získá zprávu ze 'session' a uloží ji do proměnné $data['message']. Zkontroluje, zda je uživatel přihlášen, a uloží výsledek do proměnné $data['logged']. Vrátí 'view' pro úpravu kočky s danými daty.

```editForm():``` Zpracuje formulář pro editaci kočky. Uloží změny do databáze a nastaví zprávu o úspěšné editaci. Získá hodnoty z formuláře zaslaného metodou POST. Kontroluje, zda je nahraná fotografie platná a zda již nebyla přesunuta. _Pokud je platná:_
- Vygeneruje náhodné jméno pro fotografii.
- Přesune fotografii do složky public/assets/kocky s novým názvem.
- Pokud fotografie není platná nebo se již přesunula, nastaví výchozí jméno fotografie na 'default.png' a přesune ji do složky public/assets/kocky.

```confirmDelete($id):``` Načte data konkrétní kočky podle zadaného ID a zobrazuje stránku DeleteCat pro potvrzení smazání. 	

```deleteForm():``` Zpracuje formulář pro smazání kočky. Smaže kočku z databáze a zobrazí zprávu o úspěšném smazání.

__Proměnné__:

```$kModel, $pModel, $fModel, $oModel, $sModel:``` Instance modelu pro správu dat o kočkách, plemenech, fotografiích, majitelích a statusech

```$config:```  Vytváří novou instanci konfigurační třídy CModel pro nastavení různých parametrů.

```$ionAuth:``` Instance knihovny IonAuth pro autentizaci uživatelů.

```$session:``` Objekt session pro práci se session daty (Např. nastavení flash dat -dočasná data uložená v relaci)

__2. 'Auth'__

```login():``` Zobrazení přihlašovacího formuláře. Nejprve se přes instanci session získává případná zpráva pro uživatele, která byla uložena jako flash data. Poté se ověřuje, zda je uživatel přihlášen (loggedIn() - IonAuth) a tato informace se uloží do proměnné $data['logged'].

```register():``` stejné jako u login(), ale pro registraci

```loginComplete():``` Zpracovává data z přihlašovacího formuláře. Přijímá email a heslo, ověřuje je pomocí IonAuth knihovny a přesměruje uživatele na příslušnou stránku podle jejich role (administrátor nebo běžný uživatel). Pokud přihlášení selže, zobrazí chybovou zprávu a přesměruje uživatele zpět na přihlašovací stránku.

```logoutComplete():``` Odhlásí uživatele pomocí IonAuth knihovny a přesměruje jej na hlavní stránku s kočkami.

```registerComplete():``` Zpracovává data z registračního formuláře. Přijímá uživatelské jméno, email a heslo. Registruje nového uživatele pomocí IonAuth knihovny a přesměruje jej na přihlašovací stránku.

__Proměnné:__

```$ionAuth:``` Instance třídy IonAuth. Autentizace uživatelů.

```$data['message']:``` Zpráva, která bude zobrazena uživateli, například po neúspěšném pokusu o přihlášení.

```$data['logged']:``` Hodnota označující, zda je uživatel _aktuálně_ přihlášen.

```$data['title']:``` Název stránky, který bude zobrazen v nadpisu formuláře.





