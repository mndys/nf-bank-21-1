<?php

namespace NeueFische\Account;

use NeueFische\Account;

class InterestAccount extends Account
{
    public static int $interest = 2;

    public function deposit(int $amount): void
    {
        $this->balance += $amount * static::$interest;
    }
}