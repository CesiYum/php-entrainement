<?php
declare(strict_types=1);
function priceAfterDiscount(int $price): int {
    if ($price < 0) {
        throw new InvalidArgumentException('Prix négatif');
    }
    return $price >= 100 ? intdiv($price * 90, 100) : $price;
}
function expectSame(mixed $expected, mixed $actual): void {
    if ($expected !== $actual) {
        throw new RuntimeException('Attendu ' . var_export($expected, true) . ' ; obtenu ' . var_export($actual, true));
    }
}
expectSame(99, priceAfterDiscount(99));
expectSame(90, priceAfterDiscount(100));
expectSame(180, priceAfterDiscount(200));
$rejected = false;
try { priceAfterDiscount(-1); } catch (InvalidArgumentException) { $rejected = true; }
expectSame(true, $rejected);
echo "4 vérifications réussies\n";