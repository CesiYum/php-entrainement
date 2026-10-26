<?php
declare(strict_types=1);
class Wallet {
    public function __construct(private string $owner, private int $balance = 0) {}

    public function credit(int $montant) {
        if ($montant < 0) {
            throw new InvalidArgumentException("Le montant doit etre positif.");
        }

        $this->balance += $montant;
    }

    public function debit(int $montant) {
        if ($montant < 0 || $this->balance - $montant < 0) {
            throw new InvalidArgumentException("Le montant doit etre positif & le decouvert n'est pas autorisé");
        }

        $this->balance -= $montant;
    }

    public function balance(): int {
        return $this->balance;
    }
}

$wallet = new Wallet("Coucou", 0);
$wallet->credit(100);
$wallet->debit(10);

echo $wallet->balance(), "\n";
try {
    $wallet->debit(100);
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}