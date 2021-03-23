<?php

namespace Bank;

use Monolog\Logger;


$log = new Logger('name');
$log->pushHandler(new StreamHandler('src/bank.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

class ChargingAccount extends Account
{
    public static int $fee = 2;

    public function withdraw(int $amount): void
    {
        $this->balance -= $amount;
        $this->balance -= static::$fee;
        $log->warning($this->balance -= static::$fee);
    }
}
