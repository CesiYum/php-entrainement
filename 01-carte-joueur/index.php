<?php
declare(strict_types=1);
$pseudo = 'Nova';
$niveau = 7;
$energie = 84.5;
$actif = true;

echo "Carte joueur {pseudo: {$pseudo} / niveau: {$niveau} / energie: {$energie} / actif: {$actif}} \n";

$typage = get_debug_type($pseudo) == get_debug_type($niveau);
echo "-> " . ($typage ? 'true' : 'false');
