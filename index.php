<!-- traccia

Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online; ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping.
Strutturare le classi gestendo l'ereditarietà dove necessario; ad esempio ci potrebbero essere degli utenti premium che hanno diritto a degli sconti esclusivi, oppure diverse tipologie di prodotti.
Provate a far interagire tra di loro gli oggetti: ad esempio, l'utente dello shop inserisce una carta di credito...
$c = new CreditCard(..);
$user->insertCreditCard($c);

-->
<?php

// creazione classi
class User
{
    protected $name;
    protected $surname;
    protected $age;
    protected $email;
}

// client
class Client extends User
{
    protected $shop_bag;
}

// employee
class Employee extends User
{
    private $serial_number;
    protected $employee_discount;
}

// ---------------------products-------------------//

// product
class Product
{
    protected $p_name;
    protected $p_genre;
    protected $p_pegi;
}
