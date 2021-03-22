<?php

class Account
{
    protected int $balance = 0;
    protected Customer $holder;

    public function __construct(Customer $holder)
    {
        $this->holder = $holder;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(int $amount): void
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }

    public function getBalance(): string
    {
        return $this->balance . " €";
    }

    public function transfer(int $amount, Account $account): void
    {
        $this->withdraw($amount);
        $account->deposit($amount);
    }
}