<?php

class BankAccount {
    private float $balance = 0;

    public function getBalance(): float {
        return $this->balance;
    }

    public function deposit(float $amount): void {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw(float $amount): bool {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }else {
            return false;
        }
    }
}

$account = new BankAccount();
echo $account->getBalance(); // 0
$account->deposit(100);
echo $account->getBalance(); // 100
echo $account->withdraw(30); // 70
echo $account->getBalance(); // 70
