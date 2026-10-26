<?php
declare(strict_types=1);

function toCelsius(int|float $fahrenheit): float {
    return ($fahrenheit - 32) * 5 /9;
}

function describe(mixed $value): string {
    return is_int($value) || is_float($value) ? "mesure numerique" : "mesure invalide";
}

function abort(string $message): never {
    throw new LogicException($message);
}

echo toCelsius(32), ' / ', toCelsius(68.0), "\n";
echo describe('32'), "\n";
try {
    abort('Capteur hors ligne bg');
} catch (LogicException $error) {
    echo $error->getMessage(), "\n";
}