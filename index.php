<!-- traccia

Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online; ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping.
Strutturare le classi gestendo l'ereditarietà dove necessario; ad esempio ci potrebbero essere degli utenti premium che hanno diritto a degli sconti esclusivi, oppure diverse tipologie di prodotti.
Provate a far interagire tra di loro gli oggetti: ad esempio, l'utente dello shop inserisce una carta di credito...
$c = new CreditCard(..);
$user->insertCreditCard($c);

-->
<?php

// creazione classi

// ------------- user classes -----------//
class User
{
    protected $user_id;
    protected $name;
    protected $surname;
    protected $age;
    protected $email = 'blablabla@gmail.com';


    // requested value

    public function __construct($id, $_name, $_surname, $_age)
    {
        $this->user_id = $id;
        $this->name = $_name;
        $this->age = $_age;
        $this->surname = $_surname;
    }
}

// client
class Client extends User
{
    protected $client_shop_bag;
    use Discount;
    use CreditCard;




    // set discount
    private function setDiscount()
    {
        if ($this->age < 12) {
            $this->percentage = 20;
        } elseif ($this->age > 60) {
            $this->percentage = 45;
        } else {
            $this->percentage = 0;
        }
    }

    // getdiscount
    public function getDiscount()
    {
        $this->setDiscount();
        echo "Il tuo sconto è del $this->percentage%";
    }

    // 
}

// employee
class Employee extends User
{
    private $serial_number;
    protected $employee_discount;
    protected $employee_shop_bag;
    use CreditCard;
}

// ------------user treats --------------------//

trait CreditCard
{
    private $cardid;
    private $creditcard_number;
    private $cvv;
    private $validation_date;

    // funzione per creare  carta di credito
    public function setCreditCard($card_id, $num, $cvv, $date)
    {
        $this->cardid = $card_id;
        $this->creditcard_number = $num;
        $this->cvv = $cvv;
        $this->validation_date = $date;
    }

    // assegnazione della carta creata all'utente con id corrispondente
}

// ---------------------products-------------------//

// product
class Product
{
    protected $p_name;
    protected $p_genre;
    protected $p_pegi;
    protected $price;
}

class Foodproduct extends Product
{
    protected $expiration_date;
}

// -------- products trait -----------//

trait Discount
{
    protected $_percentage;
}





// GO SHOPPING!!!!!!

$client1 = new Client(1, 'Daniele', 'Pipino', 21);
$client1->getDiscount();
$client1->setCreditCard(1, '53555333535335', '733', '12/24/45');
var_dump(($client1));
