<?php

// Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online;
// ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping.
// Strutturare le classi gestendo l’ereditarietà dove necessario;
// ad esempio ci potrebbero essere degli utenti premium che hanno diritto a degli sconti esclusivi,
//  oppure diverse tipologie di prodotti.


//1. creiamo l'eshop
class EShop {
    
    public $name;
    public $address; 
    public $products=[];

    public function __construct(string $nameEShop, string $addressEShop)

    {
      $this->name = $nameEShop;
      $this ->address = $addressEShop;

    }

    public function addProducts(Product $nomeProduct){

        $this ->products[]=$nomeProduct;
    }
    public function getProducts(){
        return $this ->products;
    }
    // mettiamo una lista di prodotti

}

// ---------------------------------------------

class Product {
 
    protected $label;
    protected $price;
    protected  $type;

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

//2. creiamo diversi prodotti
class TechProduct extends Product {
     // qui inseriremo solo le proprietà relative alla TechProduct 

    public function __construct(string $labelProduct, string $typeProduct, numeric $priceProduct )
    {
      $this->type='Tech';
      $this ->label =$labelProduct;
      $this->price = $priceProduct;

    }

}

class BeautyProduct extends Product {
     // qui inseriremo solo le proprietà relative alla BeautyProduct
     public function __construct(string $labelProduct, string $typeProduct, numeric $priceProduct )
     {
       $this->type='Beauty';
       $this ->label =$labelProduct;
       $this->price = $priceProduct;
 
     }

}


// ---------------------------------------------

class User {
    public $nome;
    public $cognome;
    public $email;
    public $number;
    public $sconto = 0;

}

class PremiumUser {
    public $nome;
    public $cognome;
    public $email;
    public $number;
    // qui dentro potrebbe avere la definizione di una percentuale di 
    // sconto per ogni prodotto.
    public $sconto = 50;


}

// ----------------------------------------------


/*
3. aggiungiamoli all'eshop
4. creaiamo l'utente normale
5. creiamo un utente premium
6. inseriamo le carte di credito per ciascun utente
6. l'utente normale acquista un prodotto
7. l'utente premium acquista un altro prodotto (e riceve lo sconto)
*/

$eShop = new EShop('Amazon', 'Via della Magliana, 375, 00148 Roma RM');
var_dump($eShop);
?>
<hr>
<?php
$mascara = new Product('Chanel', 'Beauty', 50);
$cellulare = new Product('Samsung', 'Tech', 400);
$tastiera = new Product('hp', 'Tech', 20);
$matita = new Product('Kiko', 'Beauty', 6);

$eShop ->addProducts($mascara);
$eShop ->addProducts($matita);
$eShop ->addProducts($cellulare);
$eShop ->addProducts($tastiera);

var_dump($eShop -> getProducts());

?>