<?php

class InterestAccount extends Account
{
    public int $interest = 2;

    public function deposit(int $amount): void
    {
        $this->balance += $amount * $this->interest;
    }
}