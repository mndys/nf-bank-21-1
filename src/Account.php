<?php

namespace NeueFische;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

abstract class Account
{
    protected int $balance = 0;
    protected Customer $holder;
    protected Logger $logger;

    public function __construct(Customer $holder)
    {
        $this->holder = $holder;
        $this->logger = new Logger('transactions');
        $this->logger->pushHandler(new StreamHandler('transactions.log', Logger::INFO));
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
        $this->logger->info("+ $amount");
    }

    public function withdraw(int $amount): void
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $this->logger->info("- $amount");
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
