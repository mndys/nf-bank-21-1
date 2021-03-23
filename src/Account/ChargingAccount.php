<?php

class ChargingAccount extends Account
{
    public static int $fee = 2;

    public function withdraw(int $amount): void
    {
        $this->balance -= $amount;
        $this->balance -= static::$fee;
    }

}