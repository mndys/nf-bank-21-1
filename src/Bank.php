<?php

class Bank
{
    public string $name;
    public array $accounts = [];
    public Address $address;

    public function openAccount(Account $account): void
    {
        $this->accounts[] = $account;
    }
}