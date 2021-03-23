<?php

include 'vendor/autoload.php';

$address = new \NeueFische\Address();
$address->street = 'Am Geldspeicher 1';
$address->city = 'Entenhausen';

$bank = new \NeueFische\Bank();
$bank->name = 'Geldspeicher';
$bank->address = $address;

$dagobert = new \NeueFische\Customer();
$dagobert->firstName = 'Dagobert';
$dagobert->lastName = 'Duck';
$dagobert->address = $address;

$donald = new \NeueFische\Customer();
$donald->firstName = 'Donald';
$donald->lastName = 'Duck';
$donald->address = $address;

$dagobertsAccount = new \NeueFische\Account\InterestAccount($dagobert);
$bank->openAccount($dagobertsAccount);

$donaldsAccount = new \NeueFische\Account\ChargingAccount($donald);
$bank->openAccount($donaldsAccount);

$dagobertsAccount->deposit(1000);
$dagobertsAccount->withdraw(100);
echo $dagobertsAccount->getBalance() . "\n";

$donaldsAccount->deposit(1000);
$donaldsAccount->withdraw(100);
echo $donaldsAccount->getBalance() . "\n";


//$donaldsAccount->transfer(100, $dagobertsAccount);
//var_dump($bank);
