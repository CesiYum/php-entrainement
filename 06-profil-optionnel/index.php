<?php
declare(strict_types=1);
$profile = ['name' => 'Mira', 'nickname' => null];
$lastLogin = null;

$displaySurnom = $profile['nickname'] ?? $profile['name'];

$isset_nickname = isset($profile["nickname"]);
$array_key_exists_nickname = array_key_exists("nickname", $profile);

echo "Voici le pseudo profile : $displaySurnom \n";
echo "isset : " . ($isset_nickname ? 'true' : 'false') . "\n";
echo "array_key_exists : " . ($array_key_exists_nickname ? 'true' : 'false') . "\n";

$lastLoginString = $lastLogin?->format('y/m/d') ?? "jamais";

echo "-> $lastLoginString";
