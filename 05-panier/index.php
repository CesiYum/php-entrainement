<?php
declare(strict_types=1);
$products = [
    ['name' => 'Clavier', 'price' => 59, 'available' => true],
    ['name' => 'Tapis', 'price' => 12, 'available' => false],
    ['name' => 'Souris', 'price' => 30, 'available' => true],
];

$productStock = array_filter($products, fn($p) => $p['available']);
$prixEnStock = array_map(fn($p) => $p['price'], $productStock);
$somme = array_reduce($prixEnStock, fn ($carry, $item) => $carry += $item);

echo "$somme";
