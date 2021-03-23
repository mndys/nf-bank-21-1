<?php

namespace Bank;

include "vendor/autoload.php";

$address = new Address();
$address->street = 'Am Geldspeicher 1';
$address->city = 'Entenhausen';

$bank = new Bank();
$bank->name = 'Geldspeicher';
$bank->address = $address;

$dagobert = new Customer();
$dagobert->firstName = 'Dagobert';
$dagobert->lastName = 'Duck';
$dagobert->address = $address;

$donald = new Customer();
$donald->firstName = 'Donald';
$donald->lastName = 'Duck';
$donald->address = $address;

$dagobertsAccount = new InterestAccount($dagobert);
$bank->openAccount($dagobertsAccount);

$donaldsAccount = new ChargingAccount($donald);
$bank->openAccount($donaldsAccount);

$dagobertsAccount->deposit(1000);
$dagobertsAccount->withdraw(100);
echo $dagobertsAccount->getBalance() . "\n";

$donaldsAccount->deposit(1000);
$donaldsAccount->withdraw(100);
echo $donaldsAccount->getBalance() . "\n";


//$donaldsAccount->transfer(100, $dagobertsAccount);
var_dump($bank);
