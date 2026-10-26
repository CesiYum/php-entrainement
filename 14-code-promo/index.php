<?php
declare(strict_types=1);
function discountedPrice(int $price, string $code): int {
    if ($price < 0) {
        throw new InvalidArgumentException('Price cannot be less than zero');
    }
    if ($code !== 'BON10') {
        throw new InvalidArgumentException('Code must be BON10');
    }
    return intdiv($price * 90, 100);
}

foreach (['BON10', 'CODESUPERCOOL'] as $code) {
    try {
        echo discountedPrice(200, $code), "\n";
    } catch (InvalidArgumentException $error) {
        echo $error->getMessage(), "\n";
    } finally {
        echo "FIN VERIF \n";
    }
}