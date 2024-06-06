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




