<?php
declare(strict_types=1);
$prices = [10, 40, 100];
$discount = 15;

$calculer = function (float $price) use ($discount): float {
    if ($price >= $discount) {
        return $price - $discount;
    }

    return $price;
};

$prixCentime = fn (float $prix): float => $prix * 100;

$prixFinal = array_map($calculer, $prices);
$prixCentimeFinal = array_map($prixCentime, $prixFinal);

print_r($prixCentimeFinal);
