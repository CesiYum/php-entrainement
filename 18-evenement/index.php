<?php
declare(strict_types=1);
try {
    $start = new DateTimeImmutable('2026-10-06 18:00:00', new DateTimeZone('UTC'));
} catch (DateMalformedStringException $e) {
    var_dump($e->getMessage());
}
try {
    $end = $start->modify('+90 minutes');
} catch (DateMalformedStringException $e) {
    var_dump($e->getMessage());
}
$paris = new DateTimeZone('Europe/Paris');
echo $start->format('H:i T'), "\n";
echo $start->setTimezone($paris)->format('H:i T'), "\n";
echo $start->diff($end)->format('%h h %i min'), "\n";