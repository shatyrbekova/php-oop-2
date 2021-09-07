<?php

// Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online;
// ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping.
// Strutturare le classi gestendo l’ereditarietà dove necessario;
// ad esempio ci potrebbero essere degli utenti premium che hanno diritto a degli sconti esclusivi,
//  oppure diverse tipologie di prodotti.


// creiamo l'eshop
class EShop {
    
    public $name;
    public $address; 
    public $products=[];
    public $users =[];
    public $premiumUsers=[];

    public function __construct(string $nameEShop, string $addressEShop)

    {
      $this->name = $nameEShop;
      $this ->address = $addressEShop;

    }
    // mettiamo una lista di prodotti
    public function addProducts(Product $nomeProduct){

        $this ->products[]=$nomeProduct;
    }
    public function getProducts(){
        echo $this -> products[0]->label;
        return $this ->products;
    }
   // mettiamo una lista di users 
   public function addUsers(User $users){
       $this ->users[]=$users;
   }
    // mettiamo una lista di premiumUsers 
   public function addPremiumUsers( PremiumUser $premiumUsers){
    $this ->premiumUsers[]=$premiumUsers;
}

}

// ---------------------------------------------

class Product {
 
    public $label;
    public $price;
    public  $type;

    public function getLabel() {
        return $this->label;
    }

    public function getProductPrice() {
        return $this->price;
    }
    public function getTypeProduct() {
        return $this->type;
    }

}

//  creiamo diversi prodotti
class TechProduct extends Product {
     // qui inseriremo solo le proprietà relative alla TechProduct 

    public function __construct(string $labelProduct, string $typeProduct, int $priceProduct )
    {
      $this->type='Tech';
      $this ->label =$labelProduct;
      $this->price = $priceProduct;

    }

}

class BeautyProduct extends Product {
     // qui inseriremo solo le proprietà relative alla BeautyProduct
     public function __construct(string $labelProduct, string $typeProduct, int $priceProduct )
     {
       $this->type='Beauty';
       $this ->label =$labelProduct;
       $this->price = $priceProduct;
 
     }

}


// ---------------------------------------------
//creaiamo l'utente normale
class User {
    public $nome;
    public $cognome;
    public $email;
    public $number;
    public $address;
    public $sconto = 0;
    public function __construct(string $nome, string $cognome, string $email, int $number, string $address)

    {
      $this->name = $nome;
      $this ->cognome = $cognome;
      $this ->email =$email;
      $this ->number =$number;
    }

}
// creiamo un utente premium
class PremiumUser {
    public $nome;
    public $cognome;
    public $email;
    public $number;
    public $address;
    public $creditCard  =[];
    // qui dentro potrebbe avere la definizione di una percentuale di 
    // sconto per ogni prodotto.
    public $sconto = 50;

    public function __construct(string $nome, string $cognome, string $email, int $number, string $address)

    {
      $this->name = $nome;
      $this ->cognome = $cognome;
      $this ->email =$email;
      $this ->number =$number;
    }

    // public function getCreditCard(CreditCard $creditCard){

    // }

}
//inseriamo le carte di credito per ciascun utente
class CreditCard{

 public $name;
 public $term;
 public function getName() {
    return $this->name;
}

public function getTerm() {
    return $this->term;
}
}


// ----------------------------------------------
/*



6. l'utente normale acquista un prodotto
7. l'utente premium acquista un altro prodotto (e riceve lo sconto)
*/

$eShop = new EShop('Amazon', 'Via della Magliana, 375, 00148 Roma RM');
var_dump($eShop);
?>
<hr>

<?php

// aggiungiamoli all'eshop i prodotti

$mascara = new BeautyProduct('Chanel', 'Beauty', 50);
$cellulare = new TechProduct('Samsung', 'Tech', 400);
$tastiera = new TechProduct('hp', 'Tech', 20);
$matita = new BeautyProduct('Kiko', 'Beauty', 6);

$eShop ->addProducts($mascara);
$eShop ->addProducts($matita);
$eShop ->addProducts($cellulare);
$eShop ->addProducts($tastiera);

var_dump($eShop -> getProducts());
?>
<br>
<br><hr>
<?php
$cardUser = new CreditCard();

$client1 = new User('Perizat', 'Shatyrbekova', 'sdcwecw@gmail.com', 333345533, 'Via Ferdinando Acton 21');
$client2 = new PremiumUser('Pippo', 'Baudi', 'pippo.baudi@gmail.com', 3313121312, 'Piazza Cavour 155');

var_dump($client1);
var_dump($client2);

?>